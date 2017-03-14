   ALTER PROCEDURE [dbo].[Z_P_DevNetprofit]

@DateFlag int,                         --时间标记 0 交易时间 1 发货时间
	@BeginDate	varchar(20),               --开始时间
	@EndDate	Varchar(20),               --结束时间
	@Sku		Varchar(100),              --SKU
	@SalerName VARCHAR(50),                --业绩归属人1
	@SalerName2 VARCHAR(50),               --业绩归属人2
	@chanel VARCHAR(50),                   --销售渠道
	@SaleType VARCHAR(50),	               --销售类型
	@SalerAliasName VARCHAR(max) = '',     --卖家简称 可以用逗号分隔
	@DevDate varchar(20),                  --商品开发时间--开始时间
	@DevDateEnd varchar(20),               --商品开发时间--结束时间
	@Purchaser VARCHAR(50),                --采购员
	@SupplierName VARCHAR(50),                --供应商
	@possessMan1 VARCHAR(50),                --责任归属人1
	@possessMan2 VARCHAR(50),               --责任归属人2
    @UserIDtemp int=0
AS
begin

SET NOCOUNT ON
  set @BeginDate	=	SUBSTRING(@BeginDate,1,10)
		set @EndDate	=	SUBSTRING(@EndDate,1,10)
  if @DateFlag=0
	begin
		set @BeginDate	=	DATEADD(HH,-8,@BeginDate)
		set @EndDate	=	DATEADD(HH,-8,dateadd(DD,1,@EndDate))
	end
  CREATE TABLE #tbSalerAliasName( SalerAliasName VARCHAR(100) )
  DECLARE @SelDataUser VARCHAR(Max),
          @SqlCmd VARCHAR(Max),
          @Username VARCHAR(200),
@devRate VARCHAR(10)='6.0'
    -- 现在@UserID=0 就是admin
   if @UserIDtemp=0
   begin
     set @Username='admin'
   end
   else
   begin
     set @Username=isnull((select top 1 USERID from S_SystemUser where NID=@UserIDtemp),'')
   end
   if LOWER(@Username)='admin'
   begin
        --分解卖家简称放到表格里
      IF LTRIM(RTRIM(@SalerAliasName)) <> ''
      BEGIN
        set @SalerAliasName=''''+@SalerAliasName+''''
	    SET @SalerAliasName = REPLACE(@SalerAliasName,',','''))UNION SELECT ltrim(rtrim(''')
        SET @SqlCmd = 'INSERT INTO #tbSalerAliasName(SalerAliasName) SELECT ltrim(rtrim('+ @SalerAliasName+'))'
	    EXEC(@SqlCmd )
      END
   end
   else
   begin
     --分解卖家简称放到表格里
     IF LTRIM(RTRIM(@SalerAliasName)) <> ''
      BEGIN
        set @SalerAliasName=''''+@SalerAliasName+''''
	    SET @SalerAliasName = REPLACE(@SalerAliasName,',','''))UNION SELECT ltrim(rtrim(''')
        SET @SqlCmd = 'INSERT INTO #tbSalerAliasName(SalerAliasName) SELECT ltrim(rtrim('+ @SalerAliasName+'))'
	    EXEC(@SqlCmd )
      END
      else
      begin
        -- 取有权限的几个账号
        set @SalerAliasName='非admin'
        SET @SelDataUser = ISNULL((SELECT SelDataUser
           FROM B_Person WHERE NID = @UserIDtemp),'')
        IF (ISNULL(@SelDataUser,'') = '') SET @SelDataUser = ''''
        SET @SqlCmd = 'insert into #tbSalerAliasName(SalerAliasName) SELECT spsi.NoteName '
        +' FROM S_PalSyncInfo spsi WHERE spsi.NoteName IN ('+@SelDataUser+')'
        +' UNION SELECT DictionaryName FROM  B_Dictionary WHERE (CategoryID = 12)'
        +'  AND DictionaryName IN ('+@SelDataUser+')'
        EXECUTE(@SqlCmd)

      end
   end


    declare @Sql varchar(max)

  -- 创建临时表用来存储信息
  create Table #TmpTradeInfo(
    Nid int not null,                          --订单号
    AllWeight float Null,                      --总重量
    AllQty int Null,                           --总数量
    amt float null,                            --总销售金额
    SHIPPINGAMT float null,                    --买家付运费
    SHIPDISCOUNT float null,                   --ebay交易费
    FeeAmt float null,                         --交易费(pp手续费)
    ExpressFare float null,                    --快递费
    INSURANCEAMOUNT float null,                --包装费
    SKUPACKFEE float null,                     --SKU包装费
    SKU varchar(100) null,                     --SKU
    SKUQty int null,                           --Sku数量
    SKUWeight float null,                      --SKU重量
    SKUCostPrice float null,                   --订单SKU成本价
    SKUamt float null,                         --订单SKU销售金额
    ExchangeRate float null,                   --汇率
    goodsid int null                           --商品ID
  )
  create Table #TmpSkuFreeInfo(
    SKU varchar(100)  null,                    --SKU
    SKUQty int null,                           --Sku数量
    SaleMoneyRmb float null,                   --SKU 销售金额￥
    ShippingAmtRmb float null,                 --SKU 买家付运费￥
    CostMoneyRmb float null,                   --SKU 销售成本￥
    eBayFeeRmb float null,                     --SKU ebay成交费￥
    PaypalFeeRmb float null,                   --SKU PP手续费￥
    ExpressFareRmb float null,                 --SKU 运费成本￥
    InPackageFeeRmb float null,                --SKU 包装成本￥
    OutPackageFeeRmb float null,               --SKU 外包装成本￥
  )
  create Table #TmpSumSkuFreeInfo(
    SKU varchar(100)  null,                    --SKU
    SKUQty int null,                           --销售数量
    SaleMoneyRmb float null,                   --成交价￥
    ShippingAmtRmb float null,                 --买家付运费￥
    CostMoneyRmb float null,                   --销售成本￥
    ProfitRmb float null,                      --实收利润￥
    eBayFeeRmb float null,                     --ebay成交费￥
    PaypalFeeRmb float null,                   --PP手续费￥
    ExpressFareRmb float null,                 --运费成本￥
    InPackageFeeRmb float null,                  --包装成本￥
    OutPackageFeeRmb float null,               --外包装成本￥
    AverageSaleMoneyRmb float null,            --平均售价￥
    AverageProfitRmb float null                --平均利润价￥
  )

  --查找美元的汇率
  Declare  @ExchangeRate float
  set @ExchangeRate =ISNULL((select ExchangeRate from B_CurrencyCode  where CURRENCYCODE='USD'),1)
  --查找成本计价方法
  Declare @CalcCostFlag int
  set @CalcCostFlag =ISNULL((select ParaValue from B_SysParams where ParaCode ='CalCostFlag'),0)
  -- 重寄单数据 不行 重寄单会自动删除
  --select m.OrderNumber as nid into #Tmpchongji from XS_SaleAfterM m
   --  where m.SaleType='重寄'

  --正常表的数据插入数据库
  insert into #TmpTradeInfo
  select m.Nid,                                                                        --订单号
         isnull((select Sum(IsNull(a.Weight,0))
                 from p_tradedt(nolock) a where a.tradenid = m.nid),0) as allweight ,  --总重量
         isnull((select Sum(IsNull(a.L_QTY,0))
                 from p_tradedt(nolock) a where a.tradenid = m.nid),0) as AllQty ,     --总数量
         isnull((select Sum(IsNull(a.l_amt,0))
                 from p_tradedt(nolock) a where a.tradenid = m.nid),0) as amt,         --总销售金额
          case when ISNULL(m.AMT,0)=0 then 0 else m.SHIPPINGAMT end,  --买家付运费 特殊运费
          m.SHIPDISCOUNT ,      --ebay交易费 wish特殊，有数值也为0
          m.FeeAmt
               ,                                  --交易费(pp手续费) wish特殊,（商品金额+运费总额/0.85）*0.18
         m.ExpressFare,                                                                --快递费
         m.INSURANCEAMOUNT,                                                            --包装费
         case when d.L_TAXAMT=0 then d.L_QTY*ISNULL(bg.PackFee,0)
              else d.L_TAXAMT*0 end,                                                   --SKU包装费
         d.sku,                                                                        --SKU
         d.l_qty,                                                                      --SKU数量
         d.weight,                                                                     --SKU重量
         case when @CalcCostFlag =0 then d.CostPrice
              else d.L_QTY*(case when bgs.costprice<>0 then bgs.costprice
              else isnull(bg.CostPrice,0) end ) end as SKUCostPrice,                   --订单SKU成本价
         case when ISNULL(m.AMT,0)=0 then 0 else d.l_amt end,                                                                      --订单SKU销售金额
         isnull(c.ExchangeRate,1),                                                     --汇率
         bg.nid as goodsid                                                             --商品ID
  FROM  p_tradedt(nolock) d
  inner join p_trade(nolock) m on m.nid=d.tradenid
  LEFT JOIN B_GoodsSKU bgs ON isnull(d.SKU,'')=bgs.SKU
  LEFT JOIN B_Goods bg ON bgs.GoodsID = bg.NID
  left join B_CurrencyCode c on c.currencycode=m.currencycode
  where  ((@DateFlag=1 and m.FilterFlag=100 and convert(varchar(10),m.CLOSINGDATE,121) between @BeginDate and @endDate)
			or  (@DateFlag=0 and m.ORDERTIME between @BeginDate and @endDate) )
  AND (@Sku = '' or  isnull(d.SKU,'') like '%'+ @Sku+'%')                                          --SKU
  AND (ISNULL(@SalerAliasName,'') = '' OR m.SUFFIX IN (SELECT SalerAliasName FROM #tbSalerAliasName))	   --卖家简称
  AND (ISNULL(@chanel,'') = '' OR isnull(m.TRANSACTIONTYPE,'') = @chanel)              --交易类型
  AND (ISNULL(@SaleType,'') = '' OR isnull(m.SALUTATION,'') = @SaleType) 	           --销售类型
  AND ((ISNULL(@SalerName,'') = '0') OR (isnull(bg.SalerName,'') in (select Personname from B_Person where NID=@SalerName)))
  AND ((ISNULL(@SalerName2,'') = '0') OR (isnull(bg.SalerName2,'') in (select Personname from B_Person where NID=@SalerName2)))
   AND ((ISNULL(@possessMan1,'') = '0') OR (isnull(bg.possessMan1,'') in (select Personname from B_Person where NID=@possessMan1)))
  AND ((ISNULL(@possessMan2,'') = '0') OR (isnull(bg.possessMan2,'') in (select Personname from B_Person where NID=@possessMan2)))
  AND ((ISNULL(@Purchaser,'') = '0') OR (isnull(bg.Purchaser,'') in (select Personname from B_Person where NID=@Purchaser)))
  AND ((ISNULL(@SupplierName,'') = '0') OR (isnull(bg.SupplierID,'')=@SupplierName))
  and (ISNULL(@DevDate,'') ='' or
			    (convert(varchar(10),bg.DevDate,121) >= @DevDate
			    and convert(varchar(10),bg.DevDate,121) <= @DevDateEnd))



  --历史表的数据插入数据库 不用判断发货状态  m.FilterFlag = 10
  insert into #TmpTradeInfo
  select m.Nid,                                                                            --订单号
         isnull((select Sum(IsNull(a.Weight,0))
                 from p_tradedt_his(nolock) a where a.tradenid = m.nid),0) as allweight ,  --总重量
         isnull((select Sum(IsNull(a.L_QTY,0))
                 from p_tradedt_his(nolock) a where a.tradenid = m.nid),0) as AllQty ,     --总数量
         isnull((select Sum(IsNull(a.l_amt,0))
                 from p_tradedt_his(nolock) a where a.tradenid = m.nid),0) as amt,     --总销售金额
          case when ISNULL(m.AMT,0)=0 then 0 else m.SHIPPINGAMT end ,  --买家付运费 特殊运费
        m.SHIPDISCOUNT ,      --ebay交易费 wish特殊，有数值也为0
         m.FeeAmt
               ,                                  --交易费(pp手续费) wish特殊,（商品金额+运费总额/0.85）*0.18
         m.ExpressFare,                                                                --快递费
         m.INSURANCEAMOUNT,                                                            --包装费
         case when d.L_TAXAMT=0 then d.L_QTY*ISNULL(bg.PackFee,0)
              else d.L_TAXAMT*0 end,                                                   --SKU包装费
         d.sku,                                                                        --SKU
         d.l_qty,                                                                      --SKU数量
         d.weight,                                                                     --SKU重量
         case when @CalcCostFlag =0 then d.CostPrice
              else d.L_QTY*(case when bgs.costprice<>0 then bgs.costprice
              else isnull(bg.CostPrice,0) end ) end as SKUCostPrice,                   --订单SKU成本价
         case when ISNULL(m.AMT,0)=0 then 0 else d.l_amt end,                                                                       --订单SKU销售金额
         isnull(c.ExchangeRate,1),                                                     --汇率
         bg.nid as goodsid                                                             --商品ID
  FROM  p_tradedt_his(nolock) d
  inner join p_trade_his(nolock) m on m.nid=d.tradenid
  LEFT JOIN B_GoodsSKU bgs ON isnull(d.SKU,'')=bgs.SKU
  LEFT JOIN B_Goods bg ON bgs.GoodsID = bg.NID
  left join B_CurrencyCode c on c.currencycode=m.currencycode
  where  ((@DateFlag=1 and  convert(varchar(10),m.CLOSINGDATE,121) between @BeginDate and @endDate)
			or  (@DateFlag=0 and m.ORDERTIME between @BeginDate and @endDate) )
  AND (@Sku = '' or  isnull(d.SKU,'') like '%'+ @Sku+'%')                                          --SKU
  AND (ISNULL(@SalerAliasName,'') = '' OR m.SUFFIX IN (SELECT SalerAliasName FROM #tbSalerAliasName))	   --卖家简称
  AND (ISNULL(@chanel,'') = '' OR isnull(m.TRANSACTIONTYPE,'') = @chanel)              --交易类型
  AND (ISNULL(@SaleType,'') = '' OR isnull(m.SALUTATION,'') = @SaleType) 	           --销售类型
  AND ((ISNULL(@SalerName,'') = '0') OR (isnull(bg.SalerName,'') in (select Personname from B_Person where NID=@SalerName)))
  AND ((ISNULL(@SalerName2,'') = '0') OR (isnull(bg.SalerName2,'') in (select Personname from B_Person where NID=@SalerName2)))
   AND ((ISNULL(@possessMan1,'') = '0') OR (isnull(bg.possessMan1,'') in (select Personname from B_Person where NID=@possessMan1)))
  AND ((ISNULL(@possessMan2,'') = '0') OR (isnull(bg.possessMan2,'') in (select Personname from B_Person where NID=@possessMan2)))
  AND ((ISNULL(@Purchaser,'') = '0') OR (isnull(bg.Purchaser,'') in (select Personname from B_Person where NID=@Purchaser)))
  AND ((ISNULL(@SupplierName,'') = '0') OR (isnull(bg.SupplierID,'')=@SupplierName))
  and (ISNULL(@DevDate,'') ='' or
			    (convert(varchar(10),bg.DevDate,121) >= @DevDate
			    and convert(varchar(10),bg.DevDate,121) <= @DevDateEnd))


  --更新总重量和总金额,总数量如果是0 那么改成1
  update #TmpTradeInfo set allweight = 1 where ISNULL(allweight,0) = 0
  update #TmpTradeInfo set amt = 1 where ISNULL(amt,0) = 0
  update #TmpTradeInfo set AllQty = 1 where ISNULL(AllQty,0) = 0
  --select * from #TmpTradeInfo
  --计算金额并插入临时表
  --SKU 销售金额￥    = SKU费用 * 币种汇率
  --SKU 买家付运费￥  = (买家付运费 * 币种汇率) * SKU重量 / 总重量
  --SKU 销售成本￥    = 订单SKU成本价
  --SKU ebay成交费￥  = (ebay交易费 * 美元汇率) * SKU费用 / 总费用
  --SKU PP手续费￥    = (pp手续费 * 币种汇率) * SKU费用 / 总费用
  --SKU 运费成本￥    = 快递费 * SKU重量 / 总重量
  --SKU 包装成本￥    = (包装费 * 1.0) * SKU数量 / 总数量 + sku包装费
  insert into #TmpSkuFreeInfo
  select SKU,                                                    --SKU
         SKUQty ,                                                --Sku数量
         SKUamt * ExchangeRate,                                  --SKU 销售金额￥
         (SHIPPINGAMT * ExchangeRate) * SKUamt/amt ,             --SKU 买家付运费￥
         SKUCostPrice ,                                          --SKU 销售成本￥
         (SHIPDISCOUNT * @ExchangeRate) * SKUamt/amt,            --SKU ebay成交费￥
         (FeeAmt * ExchangeRate) * SKUamt/amt,                   --SKU PP手续费￥
         ExpressFare * SKUWeight / AllWeight,                    --SKU 运费成本￥
         SKUPACKFEE,                                             --SKU 内包装成本￥
        (INSURANCEAMOUNT * 1.0) * SKUQty / AllQty                --sku 外包装成本
  from #TmpTradeInfo
  --select * from #TmpSkuFreeInfo
  --统计金额插入临时表
  --成交价￥       = sum(SKU 销售金额￥ + SKU 买家付运费￥)
  --买家付运费￥   = sum(SKU 买家付运费￥)
  --销售成本￥     = sum(SKU 销售成本￥)
  --实收利润￥     = sum(SKU 销售金额￥ + SKU 买家付运费￥ - SKU 销售成本￥ - SKU ebay成交费￥
  --                     - SKU PP手续费￥ - SKU 运费成本￥ - SKU 包装成本￥)
  --ebay成交费￥   = sum(SKU ebay成交费￥)
  --PP手续费￥     = sum(SKU PP手续费￥)
  --运费成本￥     = sum(SKU 运费成本￥)
  --包装成本￥     = sum(SKU 包装成本￥)
  --平均售价￥     = 成交价￥ / sum(Sku数量)
  --平均利润价￥   = 实收利润￥ / sum(Sku数量)
  insert into #TmpSumSkuFreeInfo
  select SKU,                                                  --SKU
         SKUQty,                                               --销售数量
         SaleMoneyRmb,                                         --成交价￥
         ShippingAmtRmb,                                       --买家付运费￥
         CostMoneyRmb,                                         --销售成本￥
         ProfitRmb,                                            --实收利润￥
         eBayFeeRmb  ,                                         --ebay成交费￥
         PaypalFeeRmb ,                                        --PP手续费￥
         ExpressFareRmb ,                                      --运费成本￥
         InPackageFeeRmb ,                                     --内包装成本￥
         OutPackageFeeRmb ,                                       --外包装成本￥
         case when SKUQty = 0 then 0
              else SaleMoneyRmb/SKUQty end,                    --平均售价￥
         case when SKUQty = 0 then 0
              else ProfitRmb/SKUQty end                        --平均利润价￥
  from
  (select SKU,                                                  --SKU
         sum(SKUQty) as SKUQty,                                --数量
         SUM(SaleMoneyRmb + ShippingAmtRmb) as SaleMoneyRmb,   --成交价￥
         SUM(ShippingAmtRmb) as ShippingAmtRmb,                --买家付运费￥
         SUM(CostMoneyRmb) as CostMoneyRmb,                    --销售成本￥
         SUM(SaleMoneyRmb + ShippingAmtRmb - CostMoneyRmb
             - eBayFeeRmb - PaypalFeeRmb - ExpressFareRmb
             - InPackageFeeRmb-OutPackageFeeRmb) as ProfitRmb,   --实收利润￥
         SUM(eBayFeeRmb) as eBayFeeRmb  ,                      --ebay成交费￥
         SUM(PaypalFeeRmb) as PaypalFeeRmb ,                   --PP手续费￥
         SUM(ExpressFareRmb) as ExpressFareRmb ,               --运费成本￥
         SUM(InPackageFeeRmb) as InPackageFeeRmb,                   --内包装成本￥
         SUM(OutPackageFeeRmb) as OutPackageFeeRmb                   --外包装成本￥
  from #TmpSkuFreeInfo
  group by SKU) aa
--select * from #TmpSumSkuFreeInfo
  --最后关联统计
  --#DevGrossProfit 包含所有信息

  select
		isnull(fg.SKU,'') as 'SKU',
		isnull(g.GoodsCode,'') as 'GoodsCode',                        -- '商品编码',
		isnull(g.GoodsName,'') as  'GoodsName',                       --'商品名称',
		isnull(abgs.CategoryName,'') as 'CategoryName',              -- '管理类别',
		ISNULL(gs.GoodsSKUStatus,'') as 'GoodsSKUStatus',             --'商品SKU状态',
		isnull(g.CreateDate,'') as 'CreateDate',										   -- '创建日期',
		g.SalerName as  'SalerName',																   --'业绩归属1',
		g.SalerName2 as 'SalerName2', 															   --'业绩归属2',
		isnull(g.Purchaser,'') as 'Purchaser',                       -- '采购员',
		(select SUM(isnull(Number,0)) from kc_currentstock where GoodsSKUID=gs.NID) as 'Number',--'库存数量',
		fg.SKUQty as 'SKUQty', 																  	   --'销售数量',
		round(fg.CostMoneyRmb,2) as 'CostMoneyRmb' ,                  --'商品成本￥',
		round(fg.SaleMoneyRmb,2) as 'SaleMoneyRmb',                   --'销售额￥',
		round(fg.CostMoneyRmb,2) as 'CostMoneyRmbSaler',                   --'销售成本￥',
		round(fg.PaypalFeeRmb,2) as 'PaypalFeeRmb',                   --'PP手续费￥',
		round(fg.eBayFeeRmb,2) as 'eBayFeeRmb',	                     -- 'ebay成交费￥',
		round(fg.InPackageFeeRmb,2) as  'InPackageFeeRmb' ,           --'内包装成本￥',
		round(fg.OutPackageFeeRmb,2) as 'OutPackageFeeRmb' ,          --'外包装成本￥',
		round(fg.ExpressFareRmb,2) as  'ExpressFareRmb' ,             --'运费成本￥',
		round(fg.ProfitRmb,2) as 'ProfitRmb',                         --'实收利润￥',
		g.possessMan1 as 'possessMan1' ,                              -- '责任归属人1',
		g.possessMan2 as 'possessMan2',                               -- '责任归属人2',

		round(case when isnull(fg.SaleMoneyRmb,0)=0 then 0 else fg.ProfitRmb*100/fg.SaleMoneyRmb end,2) as 'profitRate' --'利润率%'
 INTO #DevGrossProfit
	from #TmpSumSkuFreeInfo fg
	left join B_GoodsSKU gs on gs.SKU=fg.sku
	left join B_goods g on gs.GoodsID=g.NID
	left join B_GoodsCats abgs on abgs.NID=g.GoodsCategoryID

	--	CreateDate	SalerName	SalerName2		CostMoneyRmb	SaleMoneyRmb	CostMoneyRmbSaler	PaypalFeeRmb	eBayFeeRmb	InPackageFeeRmb		ExpressFareRmb	ProfitRmb

--0-6个月的产品
SELECT
'0-6月' as 'TimeGroup' ,
ss.SalerName,
ss.SalerName2,

    --cast(19.1111111111111111111 as DECIMAL(10,2))
--SUM(SaleMoneyRmb) as SaleMoneyRmb, 																 --销售额
cast(SUM(SaleMoneyRmb) / @ExchangeRate as DECIMAL(10,2)) as SaleMoneyRmbUS,               --销售额$
cast((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate  as DECIMAL(10,2)) as SaleMoneyRmbZn ,  --销售额￥
cast(SUM(CostMoneyRmb) as DECIMAL(10,2)) as CostMoneyRmb,     															--商品成本
--SUM(PPebay) as PPebay,
cast(SUM(PPebay) / @ExchangeRate as DECIMAL(10,2)) as PPebayUS,                           --手续费$
cast((SUM(PPebay) / @ExchangeRate) * @devRate as DECIMAL(10,2)) as PPebayZn,              --手续费￥
cast(SUM(InPackageFeeRmb) as DECIMAL(10,2)) as InPackageFeeRmb,                           --包装成本
cast(SUM(ExpressFareRmb) as DECIMAL(10,2)) as ExpressFareRmb                              --运费成本
,cast(doc.Amount as DECIMAL(10,2)) as 'devOfflineFee'						--死库费用
,cast(
(SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate
-SUM(CostMoneyRmb)
-(SUM(PPebay) / @ExchangeRate) * @devRate
-SUM(InPackageFeeRmb)
-SUM(ExpressFareRmb)
-doc.Amount

as DECIMAL(10,2)) as NetProfit                                        --毛利润
 , cast( 100*((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate
-SUM(CostMoneyRmb)
-(SUM(PPebay) / @ExchangeRate) * @devRate
-SUM(InPackageFeeRmb)
-SUM(ExpressFareRmb)
-doc.Amount)/((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate) as DECIMAL(10,2)) as netRate
                                                                     --毛利率
INTO #ZeroToSixM
from
(
	select
	CreateDate,
	SalerName,
	SalerName2,
	sum(CostMoneyRmb) as	CostMoneyRmb,
	sum(SaleMoneyRmb) as SaleMoneyRmb,
	sum(CostMoneyRmbSaler) as CostMoneyRmbSaler,
	sum(PaypalFeeRmb+eBayFeeRmb)  as PPebay ,
	sum(InPackageFeeRmb) as InPackageFeeRmb,
	sum(ExpressFareRmb) as ExpressFareRmb,
	sum(ProfitRmb) as ProfitRmb

from #DevGrossProfit
GROUP BY
	CreateDate,
	SalerName,
	SalerName2) ss
LEFT JOIN Y_devOfflineClearn doc ON doc.SalerName = ss.SalerName AND doc.SalerName2 = ss.SalerName2
WHERE ISNULL(CreateDate, '') BETWEEN CONVERT(varchar(10),dateadd(dd,-day(dateadd(month,-1,getdate()))+1,dateadd(month,-6,getdate())),121) AND CONVERT(varchar(10),dateadd(dd,-day(dateadd(month,-1,getdate()))+1,dateadd(month,-1,getdate())),121)
AND TimeGroup='0-6月'
group by
ss.SalerName,
	ss.SalerName2
,doc.Amount

--6月到12月
SELECT
'6-12月' as 'TimeGroup' ,
ss.SalerName,
ss.SalerName2,

--SUM(SaleMoneyRmb) as SaleMoneyRmb, 																 --销售额
cast(SUM(SaleMoneyRmb) / @ExchangeRate  as DECIMAL(10,2))as SaleMoneyRmbUS,               --销售额$
cast(SUM(SaleMoneyRmb) / @ExchangeRate* @devRate as DECIMAL(10,2)) as SaleMoneyRmbZn ,  --销售额￥
cast(SUM(CostMoneyRmb) as DECIMAL(10,2)) as CostMoneyRmb,     															--商品成本
--SUM(PPebay) as PPebay,
cast(SUM(PPebay) / @ExchangeRate  as DECIMAL(10,2))as PPebayUS,                           --手续费$
cast((SUM(PPebay) / @ExchangeRate) * @devRate as DECIMAL(10,2)) as PPebayZn,              --手续费￥
cast(SUM(InPackageFeeRmb) as DECIMAL(10,2)) as InPackageFeeRmb,                           --包装成本
cast(SUM(ExpressFareRmb) as DECIMAL(10,2)) as ExpressFareRmb                              --运费成本
,cast(doc.Amount as DECIMAL(10,2)) as 'devOfflineFee'--'死库费用'
,cast(
(SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate
-SUM(CostMoneyRmb)
-(SUM(PPebay) / @ExchangeRate) * @devRate
-SUM(InPackageFeeRmb)
-SUM(ExpressFareRmb)
-doc.Amount

as DECIMAL(10,2)) as NetProfit                                        --毛利润
 , cast( 100*((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate
-SUM(CostMoneyRmb)
-(SUM(PPebay) / @ExchangeRate) * @devRate
-SUM(InPackageFeeRmb)
-SUM(ExpressFareRmb)
-doc.Amount)/((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate) as DECIMAL(10,2)) as netRate
                                                                     --毛利率
INTO #SixToDecember
from
(
	select
	CreateDate,
	SalerName,
	SalerName2,
	sum(CostMoneyRmb) as	CostMoneyRmb,
	sum(SaleMoneyRmb) as SaleMoneyRmb,
	sum(CostMoneyRmbSaler) as CostMoneyRmbSaler,
	sum(PaypalFeeRmb+eBayFeeRmb)  as PPebay ,
	sum(InPackageFeeRmb) as InPackageFeeRmb,
	sum(ExpressFareRmb) as ExpressFareRmb,
	sum(ProfitRmb) as ProfitRmb

from #DevGrossProfit
GROUP BY
	CreateDate,
	SalerName,
	SalerName2) ss
LEFT JOIN Y_devOfflineClearn doc ON doc.SalerName = ss.SalerName AND doc.SalerName2 = ss.SalerName2
WHERE ISNULL(CreateDate, '') BETWEEN CONVERT(varchar(10),dateadd(dd,-day(dateadd(year,-1,getdate()))+1,dateadd(year,-1,getdate())),121) AND CONVERT(varchar(10),dateadd(dd,-day(dateadd(month,-1,getdate()))+1,dateadd(month,-6,getdate())),121)

AND TimeGroup='6-12月'
group by
ss.SalerName,
	ss.SalerName2
,doc.Amount



--12个月以上的
SELECT
'12月以上' as 'TimeGroup' ,
ss.SalerName,
ss.SalerName2,
--SUM(SaleMoneyRmb) as SaleMoneyRmb, 																 --销售额
cast(SUM(SaleMoneyRmb) / @ExchangeRate as DECIMAL(10,2)) as SaleMoneyRmbUS,               --销售额$
cast((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate as DECIMAL(10,2)) as SaleMoneyRmbZn ,  --销售额￥
cast(SUM(CostMoneyRmb) as DECIMAL(10,2)) as CostMoneyRmb,     															--商品成本
--SUM(PPebay) as PPebay,
cast(SUM(PPebay) / @ExchangeRate as DECIMAL(10,2)) as PPebayUS,                           --手续费$
cast((SUM(PPebay) / @ExchangeRate) * @devRate  as DECIMAL(10,2)) as PPebayZn,              --手续费￥
cast(SUM(InPackageFeeRmb) as DECIMAL(10,2)) as InPackageFeeRmb,                           --包装成本
cast(SUM(ExpressFareRmb) as DECIMAL(10,2)) as ExpressFareRmb                              --运费成本
,cast(doc.Amount as DECIMAL(10,2)) as 'devOfflineFee'--'死库费用'
,cast(
(SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate
-SUM(CostMoneyRmb)
-(SUM(PPebay) / @ExchangeRate) * @devRate
-SUM(InPackageFeeRmb)
-SUM(ExpressFareRmb)
-doc.Amount

as DECIMAL(10,2)) as NetProfit                                        --毛利润
 , cast( 100*((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate
-SUM(CostMoneyRmb)
-(SUM(PPebay) / @ExchangeRate) * @devRate
-SUM(InPackageFeeRmb)
-SUM(ExpressFareRmb)
-doc.Amount)/((SUM(SaleMoneyRmb) / @ExchangeRate)* @devRate) as DECIMAL(10,2)) as netRate
                                                                     --毛利率
INTO #AboveDecember
from
(
	select
	CreateDate,
	SalerName,
	SalerName2,
	sum(CostMoneyRmb) as	CostMoneyRmb,
	sum(SaleMoneyRmb) as SaleMoneyRmb,
	sum(CostMoneyRmbSaler) as CostMoneyRmbSaler,
	sum(PaypalFeeRmb+eBayFeeRmb)  as PPebay ,
	sum(InPackageFeeRmb) as InPackageFeeRmb,
	sum(ExpressFareRmb) as ExpressFareRmb,
	sum(ProfitRmb) as ProfitRmb

from #DevGrossProfit
GROUP BY
	CreateDate,
	SalerName,
	SalerName2) ss
LEFT JOIN Y_devOfflineClearn doc ON doc.SalerName = ss.SalerName AND doc.SalerName2 = ss.SalerName2
WHERE ISNULL(CreateDate, '') BETWEEN CONVERT(varchar(10),dateadd(dd,-day(dateadd(month,-1,getdate()))+1,dateadd(month,-6,getdate())),121) AND CONVERT(varchar(10),dateadd(dd,-day(dateadd(month,-1,getdate()))+1,dateadd(month,-1,getdate())),121)
AND TimeGroup='12月以上'
group by
ss.SalerName,
	ss.SalerName2
,doc.Amount

--SELECT * from #ZeroToSixM
TRUNCATE TABLE Y_devNetprofit
INSERT INTO Y_devNetprofit
 SELECT *
FROM (
SELECT * from #ZeroToSixM
UNION ALL
SELECT * from #SixToDecember
UNION ALL
SELECT * from #AboveDecember
) zsa

	drop table #TmpTradeInfo
	drop table #TmpSkuFreeInfo
	drop table #TmpSumSkuFreeInfo
	DROP table #DevGrossProfit
	DROP table #ZeroToSixM
  DROP TABLE #SixToDecember
	DROP TABLE #AboveDecember
end
