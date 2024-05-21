"use strict";!function(){let o,e,r,t,a,s;s=isDarkStyle?(o=config.colors_dark.cardColor,e=config.colors_dark.headingColor,r=config.colors_dark.textMuted,t=config.colors_dark.bodyColor,a=config.colors_dark.borderColor,"dark"):(o=config.colors.white,e=config.colors.headingColor,r=config.colors.textMuted,t=config.colors.bodyColor,a=config.colors.borderColor,"light");var i=document.querySelector("#visitsRadialChart"),l={chart:{height:270,type:"radialBar"},colors:[config.colors.primary,config.colors.danger,config.colors.warning],series:[75,80,85],plotOptions:{radialBar:{offsetY:-10,hollow:{size:"45%"},track:{margin:10,background:o},dataLabels:{name:{fontSize:"15px",colors:[t],fontFamily:"IBM Plex Sans",offsetY:25},value:{fontSize:"2rem",fontFamily:"Rubik",fontWeight:500,color:e,offsetY:-15},total:{show:!0,label:"Total Visits",fontSize:"15px",fontWeight:400,fontFamily:"IBM Plex Sans",color:t}}}},grid:{padding:{top:-10,bottom:-10}},stroke:{lineCap:"round"},labels:["Target","Mart","Ebay"],legend:{show:!0,position:"bottom",horizontalAlign:"center",labels:{colors:t,useSeriesColors:!1},itemMargin:{horizontal:15},markers:{width:10,height:10,offsetX:-3}}},i=(null!==i&&new ApexCharts(i,l).render(),document.querySelector("#revenueGrowthChart")),l={chart:{height:90,type:"bar",stacked:!0,toolbar:{show:!1}},grid:{show:!1,padding:{left:0,right:0,top:-20,bottom:-20}},plotOptions:{bar:{horizontal:!1,columnWidth:"20%",borderRadius:2,startingShape:"rounded",endingShape:"flat"}},legend:{show:!1},dataLabels:{enabled:!1},colors:[config.colors.info,config.colors_label.secondary],series:[{name:"2020",data:[80,60,125,40,50,30,70,80,100,40,80,60,120,75,25,135,65]},{name:"2021",data:[50,65,40,100,30,30,80,20,50,45,30,90,70,40,50,40,60]}],xaxis:{categories:["10","","","","","","","","15","","","","","","","","20"],axisBorder:{show:!1},axisTicks:{show:!1},labels:{style:{colors:r},offsetY:-5}},yaxis:{show:!1,floating:!0},tooltip:{x:{show:!1}}},i=(null!==i&&new ApexCharts(i,l).render(),document.querySelector("#orderSummaryChart")),l={chart:{height:230,type:"area",toolbar:!1,dropShadow:{enabled:!0,top:18,left:2,blur:3,color:config.colors.primary,opacity:.15}},markers:{size:6,colors:"transparent",strokeColors:"transparent",strokeWidth:4,discrete:[{fillColor:o,seriesIndex:0,dataPointIndex:9,strokeColor:config.colors.primary,strokeWidth:4,size:6,radius:2}],hover:{size:7}},series:[{data:[15,18,13,19,16,31,18,26,23,39]}],dataLabels:{enabled:!1},stroke:{curve:"smooth",lineCap:"round"},colors:[config.colors.primary],fill:{type:"gradient",gradient:{shade:s,shadeIntensity:.8,opacityFrom:.7,opacityTo:.25,stops:[0,95,100]}},grid:{show:!0,borderColor:a,padding:{top:-15,bottom:-10,left:15,right:10}},xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct"],labels:{offsetX:0,style:{colors:r,fontSize:"13px"}},axisBorder:{show:!1},axisTicks:{show:!1},lines:{show:!1}},yaxis:{labels:{offsetX:7,formatter:function(o){return"$"+o},style:{fontSize:"13px",colors:r}},min:0,max:40,tickAmount:4}},i=(null!==i&&new ApexCharts(i,l).render(),document.querySelector("#marketingCampaignChart1")),l={chart:{height:55,width:55,fontFamily:"IBM Plex Sans",type:"donut"},dataLabels:{enabled:!1},grid:{padding:{top:-5,bottom:-5,left:-2,right:0}},series:[60,45,60],stroke:{width:3,lineCap:"round",colors:[o]},colors:[config.colors.primary,config.colors.warning,config.colors.success],plotOptions:{pie:{donut:{size:"65%",labels:{show:!1,value:{show:!1},total:{show:!1}}}}},legend:{show:!1},states:{active:{filter:{type:"none"}}}},i=(null!==i&&new ApexCharts(i,l).render(),document.querySelector("#marketingCampaignChart2")),l={chart:{height:55,width:55,fontFamily:"IBM Plex Sans",type:"donut"},dataLabels:{enabled:!1},grid:{padding:{top:-5,bottom:-5,left:-2,right:0}},series:[60,30,30],stroke:{width:3,lineCap:"round",colors:[o]},colors:[config.colors.danger,config.colors.secondary,config.colors.primary],plotOptions:{pie:{donut:{size:"65%",labels:{show:!1,value:{show:!1},total:{show:!1}}}}},legend:{show:!1},states:{active:{filter:{type:"none"}}}};null!==i&&new ApexCharts(i,l).render()}();