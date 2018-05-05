# e-commerce API


## Revision History

### 0.9.0 (23 / 04 / 2018)

- First release

## e-commerce API

###  End-point

```http://udonfooddelivery.xyz/backend```

###  Resources


| Resource                                  | HTTP METHOD | Description                   |
| ----------------------------------------- | ----------- | ----------------------------- |
| [/apitest2/listtest2](#resfoodpro_get)    | GET| ข้อมูลร้านอาหาร เมนูอาหารของร้านตนเอง และโปรโมชั้นของร้านตนเอง |
| [/apipromotion/listpromotion](#protoday_get) | GET | ข้อมูลร้านอาหารที่มีโปรโมชั่นวันนี้ |
| [/apirestaurant/listrestaurant](#allres_get) | GET | ร้านอาหารทั้งหมด |
| [/apitestfood2/listtestfood2/:id](#food_get_by_id) | GET | ข้อมูลร้าน เมนูแนะนำ เมนูธรรมดาของร้าน ตาม id ร้าน  |
| [/apireviewres/listreviewres/:id](#review_get_by_id) | GET | ข้อมูลรีวิวร้านอาหาร ตาม id ร้าน  |
| [/apigetreviewres/insertresreview](#review_post) | POST | เพิ่มข้อมูลรีวิวร้านอาหาร  |
| [/apifavoritemenu/listfavoritemenu/:id](#favoritemenu_get_by_id) | GET | แสดงเมนูโปรด ตาม id ลูกค้า  |
| [/apifavoritemenu/insertfavoritemenu](#favoritemenu_post) | POST | เพิ่มเมนูโปรด |
| [/apifavoritemenu/deletefavoritemenu/:id](#favoritemenu_delete) | DELETE | ลบเมนูโปรด ตาม id เมนูโปรด |
| [/apiorder/insertorder](#order_post) | POST | เพิ่มorder |
| [/apiorder/deleteorder](#order_delete) | DELETE | ลบorder ตาม id กการั่งซื้อ |
| [/apiorder/listorder](#order_get) | GET | ข้อมูลการสั่งซื้ออาหาร |
| [/apiorderdetail/insertorderdetail](#orderdetail_post) | POST | เพิ่มorderdetail |
| [/apiupdateorderdetail/updateorderdetail](#orderdetail_post) | POST | แก้ไขorderdetail โดยส่งรหัส orderdetail มา |
| [/apiorderdetail/deleteorderdetail](#orderdetail_delete) | DELETE | ลบ orderdetail ตาม id การสั่งซื้อ (IDOder) |
| [/apicustomer/insertcustomer](#customer_post) | POST | เพิ่มcustomer เพิ่มลูกค้า สมัครสมาชิก |
| [/apicustomer/insertcustomer2](#customer_post) | POST | เพิ่มcustomer เพิ่มลูกค้า สมัครสมาชิก |
| [/apilistcustomer/listcustomer](#customer_post) | GET | แสดงข้อมูลลูกค้า โดยส่งไอดีมา |
| [/apiupdatecustomer/updatecustomer](#customer_post) | POST |แก้ไข customer เพิ่มลูกค้า สมัครสมาชิก โดยส่งรหัส สามาชิก มา |
| [/apicusaddress/listcusaddress](#cusaddress_get_by_id) | GET | แสดงข้อมุลที่อยู๋ของลูกค้า ตาม id ลูกค้า |
| [/apiorderjing/insertorderjing](#orderjing_post) | POST | เพิ่ม order orderdetail delivery |
| [/apiorderhistory/listorderhistory](#orderhistory_get) | GET | แสดง 1orderhistory โดยส่งรหัส ลูกค้ามา |
| [/apitestfood22/listtestfood22/:id](#food2_get_by_id) | GET | ข้อมูลร้าน 1เมนูแนะนำ เมนูธรรมดาของร้าน รายละเอียดของแต่ละเมนู ตาม id ร้าน  |
| [/apiinsertcusaddress/insertcustomeraddress](#customeraddress_post) | POST | 1เพิ่มที่อยู่ลูกค้า |
| [/apiinsertcusaddress/insertcustomeraddressbymap](#customeraddress_post) | POST | เพิ่มที่อยู่ลูกค้าจากการเลือกในเแผ่นที่ |
| [/updatecusaddress/updatecustomeraddress](#customer_post) | POST |แก้ไ1ข customeraddress   โดยส่งรหัส ที่อยู่ มา |
| [apilocation/listlocationall](#location_get) | GET| แสดงตำแหน้งทั้ง1หมด |
| [apilocation/listlocationbytype](#locationbytype_get) | GET| แสดงตำแหน้ง แยะยามปนะเถทตำแหย1่ง |
| [apideliverypro/listdeliverypro](#deliverypro_get) | GET| แสดงตำแหน้ง โแรดมชั่นการจัดส่ง|
| [apideliverytime/listdeliverytime](#deliverytime_get) | GET| แสดงเวลาในการจัดส่ง|
| [/apicustomer/customerlogin](#customerlogin_post) | POST | เลูกค้าข้าสูระบบ |
| 

<div class="page-break" />

<div id="resfoodpro_get">

###   RESFOODPRO (GET)
| Attribute   | Description |
| ----------- | ----------- |
| URL         | /apitest2/listtest2  |
| HTTP METHOD | GET         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apitest2/listtest2
```
####  Response example (Success)
```json
    {
    success: true,
    data: [
    {
    ชื่อร้าน: {
    IDRestaurant: "21",
    ResName: "ส้มตำเจ้ไก่",
    ResLowPrice: "50",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ส้มตำเจ๊ไก่1.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "27",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ส้มตำ.png",
    FoodName: "ส้มตำป่า",
    FoodPrice: "50",
    IDFoodType: "2",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "21"
    },
    {
    IDFood: "28",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ไก่ย่าง.jpg",
    FoodName: "ไก่ย่าง",
    FoodPrice: "120",
    IDFoodType: "7",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "21"
    },
    {
    IDFood: "29",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ปลาเผา.jpg",
    FoodName: "ปลาเผา",
    FoodPrice: "148",
    IDFoodType: "7",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "21"
    },
    {
    IDFood: "47",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/1399167252-IMG1824JPG-o.jpg",
    FoodName: "ผัดหมี่",
    FoodPrice: "10",
    IDFoodType: "1",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "21"
    },
    {
    IDFood: "48",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/1399167381-IMG1826JPG-o.jpg",
    FoodName: "หมูยอ",
    FoodPrice: "20",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "21"
    },
    {
    IDFood: "49",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/1399167420-IMG1825JPG-o.jpg",
    FoodName: "แกงอ่อมหอย",
    FoodPrice: "40",
    IDFoodType: "6",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "21"
    },
    {
    IDFood: "50",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/1399167523-IMG1837JPG-o.jpg",
    FoodName: "ส้มตำลาว ",
    FoodPrice: "40",
    IDFoodType: "2",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "21"
    },
    {
    IDFood: "98",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/2fb97366740a45c9b012ea14f01dad77.jpg",
    FoodName: "dddd",
    FoodPrice: "100",
    IDFoodType: "6",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "21"
    }
    ],
    โปรโมชั่น: [
    {
    ResPromotionName: "ฟรีค่าจัดส่ง",
    ResPromotionStart: "2018-02-21",
    ResPromotionEnd: "2018-04-25"
    }
    ]
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "22",
    ResName: "ร้านอาหารลาบนัว",
    ResLowPrice: "80",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ลาบนัว.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "30",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/CkUyFGUUgAAVY9B.jpg",
    FoodName: "ส้มตำกุ้งสด",
    FoodPrice: "130",
    IDFoodType: "2",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "22"
    },
    {
    IDFood: "31",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/3C5VS06116FF2737719C2Clv.jpg",
    FoodName: "ไก่ย่างรสแซบ",
    FoodPrice: "80",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "22"
    },
    {
    IDFood: "32",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/3B9QBWB340F70CAA4FF2CEmx.jpg",
    FoodName: "ปีกไก่ทอด",
    FoodPrice: "70",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "22"
    },
    {
    IDFood: "33",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ลาบนัวอุดร_สาขาเชียงใหม่_-8.jpg",
    FoodName: "ส้มตำหอยแครง",
    FoodPrice: "130",
    IDFoodType: "2",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "22"
    },
    {
    IDFood: "51",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/3EEO8WAB28052E4702CC0Clv.jpg",
    FoodName: "ตับหวาน",
    FoodPrice: "45",
    IDFoodType: "1",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "22"
    },
    {
    IDFood: "52",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/3EEO55CB7303EA6435B3DDlv.jpg",
    FoodName: "เล้งแซ่บ",
    FoodPrice: "50",
    IDFoodType: "8",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "22"
    },
    {
    IDFood: "53",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/3EEO1WC9345F88B1C3BE5Clv.jpg",
    FoodName: "คอหมูย่าง",
    FoodPrice: "60",
    IDFoodType: "7",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "22"
    }
    ],
    โปรโมชั่น: [
    {
    ResPromotionName: "ฟรีค่าจัดส่ง",
    ResPromotionStart: "2018-02-05",
    ResPromotionEnd: "2018-03-30"
    }
    ]
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "23",
    ResName: "แจ่วฮ้อนเมืองอุดร",
    ResLowPrice: "258",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/27541067_861024347402237_6075913401979494982_n.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "34",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27657222_861496397355032_6626810527092375231_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดหมู)",
    FoodPrice: "259",
    IDFoodType: "6",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "35",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27655234_861496420688363_8968836187597220580_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดโพนยางคำ)",
    FoodPrice: "299",
    IDFoodType: "8",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "36",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27654491_861496444021694_207682792096729626_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดทะเล)",
    FoodPrice: "379",
    IDFoodType: "8",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "37",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27540288_861496464021692_2166585713836766700_n.jpg",
    FoodName: "แจ่งฮ้อน (ชุดรวม)",
    FoodPrice: "399",
    IDFoodType: "8",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "67",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27867707_872851552886183_8148236937003520823_n.jpg",
    FoodName: "น้ำสต๊อกแจ่วฮ้อน",
    FoodPrice: "60",
    IDFoodType: "1",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "68",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27973117_872851556219516_7482144630501419580_n.jpg",
    FoodName: "น้ำจิ้มแจ่วแบบขม",
    FoodPrice: "30",
    IDFoodType: "1",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "69",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/28166720_872851566219515_201760074857828810_n.jpg",
    FoodName: "น้ำจิ้มแบบปวหวาน",
    FoodPrice: "30",
    IDFoodType: "9",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "23"
    }
    ],
    โปรโมชั่น: null
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "24",
    ResName: "ข้าวต้มเพิ่มโชค",
    ResLowPrice: "80",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/restaurant-puamchok001.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "38",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/6fb25953c39e4ec086458695a0483baa.jpg",
    FoodName: "ผัดหมูหนำเลี๊ยบ ",
    FoodPrice: "120",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "39",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/274d49d280634f9aaca6839e90150656.jpg",
    FoodName: "เป็ดพะโล้",
    FoodPrice: "130",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "40",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/4d66372a4fe74ff2ad8b3a883a18d2da.jpg",
    FoodName: "หอยลายผัดน้ำพริกเผา ",
    FoodPrice: "130",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "41",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/fead01db16c44adf971edccfe377afea.jpg",
    FoodName: "ผัดถั่วงอกเต้าหู้ ",
    FoodPrice: "80",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "54",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/77a109de14374321b9d1d261430a7206.jpg",
    FoodName: "กบทอดกระเทียม",
    FoodPrice: "49",
    IDFoodType: "4",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "24"
    },
    {
    IDFood: "55",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/0f6d87b20f094bf6be91efa3c72468d2.jpg",
    FoodName: "หมึกระเบิด",
    FoodPrice: "49",
    IDFoodType: "4",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "56",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/f8987501e2f44d5c9a6b020947de1641.jpg",
    FoodName: "กุ๋ยช่ายขาวผัดเต้าหู้",
    FoodPrice: "45",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "57",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/e6c6df3005134fbd88825639214b9d00.jpg",
    FoodName: "ปลิงทะเลกระเพรากรอบ",
    FoodPrice: "55",
    IDFoodType: "4",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "58",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/99d9f534b37a49ecadf7bae13624bd81.jpg",
    FoodName: "เต้าซี่หมูสับ",
    FoodPrice: "60",
    IDFoodType: "4",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "24"
    },
    {
    IDFood: "59",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/f4526c536e5e4720a8040542c936ca9b.jpg",
    FoodName: "เป็ดพะโล้",
    FoodPrice: "80",
    IDFoodType: "1",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "24"
    }
    ],
    โปรโมชั่น: null
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "25",
    ResName: "The Zixga club",
    ResLowPrice: "130",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/The-zixga-club2-e1466758663184.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "42",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/0b2c3263a7c1459da5cc4e855e8c397b.jpg",
    FoodName: "คิงไซส์ เบอร์เกอร์",
    FoodPrice: "150",
    IDFoodType: "6",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    },
    {
    IDFood: "43",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/af328adc58f544afb17e055645b9648c.jpg",
    FoodName: "แพนเค้ก",
    FoodPrice: "150",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    },
    {
    IDFood: "60",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/66d4d50367d1483794f23a4110117b2c.jpg",
    FoodName: "สเต็กสันคอหมู",
    FoodPrice: "99",
    IDFoodType: "7",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "25"
    },
    {
    IDFood: "61",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/aeceef2df2484c00ab0d8b9fb4b91484.jpg",
    FoodName: "ต้มยำจิ๊กโก๋",
    FoodPrice: "70",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    },
    {
    IDFood: "62",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/2fb97366740a45c9b012ea14f01dad77.jpg",
    FoodName: "ราเมงต้มยำหมูเด้ง",
    FoodPrice: "75",
    IDFoodType: "8",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "25"
    },
    {
    IDFood: "63",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/43a86c012ed84ef59748efca4d545939.jpg",
    FoodName: "คลาสสิคเบอเกอร์หมู",
    FoodPrice: "110",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    },
    {
    IDFood: "64",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ba70f0040fd04338a316bffa02e1d172.jpg",
    FoodName: "บานนอฟฟี่",
    FoodPrice: "60",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    },
    {
    IDFood: "65",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/2ac822b43ffe4989a86dc440472df374.jpg",
    FoodName: "เมล่อน มิลค์",
    FoodPrice: "90",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    },
    {
    IDFood: "66",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/facaf82a89a24e53ad372c1803fff13c.jpg",
    FoodName: "ไก่กลิ้งซอสสไปซี่",
    FoodPrice: "120",
    IDFoodType: "7",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "25"
    }
    ],
    โปรโมชั่น: [
    {
    ResPromotionName: "ฟรีค่าจัดส่ง",
    ResPromotionStart: "2018-02-09",
    ResPromotionEnd: "2018-03-31"
    }
    ]
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "26",
    ResName: "Twosone cafe",
    ResLowPrice: "150",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/twosone-cafe1.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "44",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/8816cf96b08a4317859edb0894d681e1.jpg",
    FoodName: "ชากุหลาบ",
    FoodPrice: "50",
    IDFoodType: "5",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "26"
    }
    ],
    โปรโมชั่น: [
    {
    ResPromotionName: "ฟรีค่าจัดส่ง",
    ResPromotionStart: "2018-02-01",
    ResPromotionEnd: "2018-04-19"
    },
    {
    ResPromotionName: "ฟรีค่าจัดส่ง",
    ResPromotionStart: "2018-02-13",
    ResPromotionEnd: "2018-04-19"
    },
    {
    ResPromotionName: "ฟรีค่าจัดส่ง",
    ResPromotionStart: "2018-03-07",
    ResPromotionEnd: "2018-03-15"
    }
    ]
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "27",
    ResName: "บ้านไม้ขาว",
    ResLowPrice: "100",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ban-mai-kow.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "45",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ban-mai-kow2.jpg",
    FoodName: "ตำถั่ว",
    FoodPrice: "35",
    IDFoodType: "2",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    },
    {
    IDFood: "46",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/f27eec85e0d74aa6bc691b653594f0ae.jpg",
    FoodName: "สลัดไก่อบจี๊ดจ๊าด",
    FoodPrice: "49",
    IDFoodType: "1",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "27"
    },
    {
    IDFood: "70",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/CO8LO1-UEAAudOH.jpg",
    FoodName: "สลัดทูน่า",
    FoodPrice: "120",
    IDFoodType: "10",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "27"
    },
    {
    IDFood: "71",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/CO8LO6XU8AEa0_W.jpg",
    FoodName: "ไก่ทอดซอสเกาหลี",
    FoodPrice: "80",
    IDFoodType: "4",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "27"
    },
    {
    IDFood: "72",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27459824_1709365635752376_4750704835903926771_n.jpg",
    FoodName: "ผัดกระเพราไข่เจียว",
    FoodPrice: "50",
    IDFoodType: "11",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    },
    {
    IDFood: "73",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27331966_1707334059288867_4123938193824810032_n.jpg",
    FoodName: "เต้าฮวยนมสดมะพร้าวอ่อน",
    FoodPrice: "40",
    IDFoodType: "12",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    },
    {
    IDFood: "74",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/26239821_1692890060733267_8188657007107193544_n.jpg",
    FoodName: "แกงอ่อมหมู",
    FoodPrice: "50",
    IDFoodType: "8",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    },
    {
    IDFood: "75",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/20707908_1540882295934045_7663142362158584215_n.jpg",
    FoodName: "ตำถั่ว",
    FoodPrice: "40",
    IDFoodType: "2",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    },
    {
    IDFood: "76",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/19904965_1511556552199953_1123322569853048465_n.jpg",
    FoodName: "ข้าวหน้าหมูเทอริยากิ",
    FoodPrice: "80",
    IDFoodType: "1",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    },
    {
    IDFood: "77",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/18839358_1472774726078136_6868361182990727114_n.jpg",
    FoodName: "ข้าวก้องหน้าแซวม่อน",
    FoodPrice: "120",
    IDFoodType: "4",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "27"
    }
    ],
    โปรโมชั่น: null
    },
    {
    ชื่อร้าน: {
    IDRestaurant: "28",
    ResName: "ร้าน กินเตี๋ยวกัน ณ โนนสูงอุดร",
    ResLowPrice: "100",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/kin-teiw-kan2.jpg"
    },
    เมนูอาหาร: [
    {
    IDFood: "78",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/19420852_1518927088170711_4007503272800593351_n.jpg",
    FoodName: "น้ำตกถ้วยยักษ์",
    FoodPrice: "199",
    IDFoodType: "14",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "28"
    },
    {
    IDFood: "79",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/19429797_1518927144837372_3195150520910003147_n.jpg",
    FoodName: "ก๋วยเตี๋ยวน้ำตกยักษ์ เล็ก",
    FoodPrice: "100",
    IDFoodType: "14",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "28"
    },
    {
    IDFood: "80",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/1374810291.jpg",
    FoodName: "กากหมู",
    FoodPrice: "30",
    IDFoodType: "4",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    },
    {
    IDFood: "81",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/images.jpg",
    FoodName: "ลูกชิ้นหมู",
    FoodPrice: "30",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    },
    {
    IDFood: "82",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/ดาวน์โหลด.jpg",
    FoodName: "เส้นเล็ก",
    FoodPrice: "20",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    },
    {
    IDFood: "83",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/1365945981-113JPG-o.jpg",
    FoodName: "เส้นหมี่",
    FoodPrice: "20",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    },
    {
    IDFood: "84",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/image01.jpg",
    FoodName: "บะหมี่เหลือง",
    FoodPrice: "20",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    },
    {
    IDFood: "85",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/510944448.jpg",
    FoodName: "หมูนุ่ม",
    FoodPrice: "30",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    },
    {
    IDFood: "86",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/df5eae392df52a0c668ca225ed7aaf08.jpg",
    FoodName: "ลูกชิ้นปลา",
    FoodPrice: "30",
    IDFoodType: "8",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "28"
    }
    ],
    โปรโมชั่น: null
    }
    ]
    }
    
```

<div class="page-break" />


<div id="protoday_get">

### PROTODAY (GET)
| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apipromotion/listpromotion |
| HTTP METHOD | GET                     |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apipromotion/listpromotion
```
####  Response example (Success)
```json
{
success: true,
data: [
{
IDRestaurant: "21",
ResName: "ส้มตำเจ้ไก่",
ResLowPrice: "50",
ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ส้มตำเจ๊ไก่1.jpg",
ResPromotionName: "ฟรีค่าจัดส่ง",
ResPromotionStart: "2018-02-21",
ResPromotionEnd: "2018-04-25"
},
{
IDRestaurant: "22",
ResName: "ร้านอาหารลาบนัว",
ResLowPrice: "80",
ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ลาบนัว.jpg",
ResPromotionName: "ฟรีค่าจัดส่ง",
ResPromotionStart: "2018-02-05",
ResPromotionEnd: "2018-03-30"
},
{
IDRestaurant: "25",
ResName: "The Zixga club",
ResLowPrice: "130",
ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/The-zixga-club2-e1466758663184.jpg",
ResPromotionName: "ฟรีค่าจัดส่ง",
ResPromotionStart: "2018-02-09",
ResPromotionEnd: "2018-03-31"
},
{
IDRestaurant: "26",
ResName: "Twosone cafe",
ResLowPrice: "150",
ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/twosone-cafe1.jpg",
ResPromotionName: "ฟรีค่าจัดส่ง",
ResPromotionStart: "2018-02-01",
ResPromotionEnd: "2018-04-19"
},
{
IDRestaurant: "26",
ResName: "Twosone cafe",
ResLowPrice: "150",
ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/twosone-cafe1.jpg",
ResPromotionName: "ฟรีค่าจัดส่ง",
ResPromotionStart: "2018-02-13",
ResPromotionEnd: "2018-04-19"
},
{
IDRestaurant: "26",
ResName: "Twosone cafe",
ResLowPrice: "150",
ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/twosone-cafe1.jpg",
ResPromotionName: "ฟรีค่าจัดส่ง",
ResPromotionStart: "2018-03-07",
ResPromotionEnd: "2018-03-15"
}
]
}
```


<div class="page-break">

<div id="allres_get">

### allres (GET)
| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apirestaurant/listrestaurant |
| HTTP METHOD | GET                     |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apirestaurant/listrestaurant
```
####  Response example (Success)
```json
    {
    success: true,
    data: [
    {
    IDRestaurant: "21",
    ResName: "ส้มตำเจ้ไก่",
    ResLowPrice: "50",
    latlng: "17.414378205019798,102.78364621125297",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ส้มตำเจ๊ไก่1.jpg"
    },
    {
    IDRestaurant: "22",
    ResName: "ร้านอาหารลาบนัว",
    ResLowPrice: "80",
    latlng: "17.366247345638175,102.81635080541173",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ลาบนัว.jpg"
    },
    {
    IDRestaurant: "23",
    ResName: "แจ่วฮ้อนเมืองอุดร",
    ResLowPrice: "258",
    latlng: "17.366185906970095,102.81580589733949",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/27541067_861024347402237_6075913401979494982_n.jpg"
    },
    {
    IDRestaurant: "24",
    ResName: "ข้าวต้มเพิ่มโชค",
    ResLowPrice: "80",
    latlng: "17.39685095520006,102.7965666825562",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/restaurant-puamchok001.jpg"
    },
    {
    IDRestaurant: "25",
    ResName: "The Zixga club",
    ResLowPrice: "130",
    latlng: "17.408225090890156,102.78665323803716",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/The-zixga-club2-e1466758663184.jpg"
    },
    {
    IDRestaurant: "26",
    ResName: "Twosone cafe",
    ResLowPrice: "150",
    latlng: "40.7324319,-73.82480777777776",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/twosone-cafe1.jpg"
    },
    {
    IDRestaurant: "27",
    ResName: "บ้านไม้ขาว",
    ResLowPrice: "100",
    latlng: "17.406300444410622,102.80158777783208",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ban-mai-kow.jpg"
    },
    {
    IDRestaurant: "28",
    ResName: "ร้าน กินเตี๋ยวกัน ณ โนนสูงอุดร",
    ResLowPrice: "100",
    latlng: "17.40302440379257,102.80090113232427",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/kin-teiw-kan2.jpg"
    }
    ]
    }


```

<div class="page-break">

<div id="food_get_by_id">

### food (GET)
| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apitestfood2/listtestfood2/:id |
| HTTP METHOD | GET                     |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apitestfood2/listtestfood2?id=23
```
####  Response example (Success)
```json
    {
    success: true,
    data: {
    restaurant: {
    IDRestaurant: "23",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/27541067_861024347402237_6075913401979494982_n.jpg",
    ResName: "แจ่วฮ้อนเมืองอุดร",
    ResLowPrice: "258",
    ResAddress: "แยก, ทางหลวงชนบท อุดรธานี 3191 ตำบล หนองขอนกว้าง อำเภอเมืองอุดรธานี อุดรธานี 41000",
    ResTel: "093-321-4501",
    ResTimeStart: "10:00:00",
    ResTimeEnd: "23:00:00",
    latlng: "17.366185906970095,102.81580589733949",
    IDLocation: "2"
    },
    RecommendedMenu: [
    {
    IDFood: "34",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27657222_861496397355032_6626810527092375231_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดหมู)",
    FoodPrice: "259",
    IDFoodType: "6",
    FoodTypeName: "เมนูแกง ต้มยำ",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "35",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27655234_861496420688363_8968836187597220580_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดโพนยางคำ)",
    FoodPrice: "299",
    IDFoodType: "8",
    FoodTypeName: "เมนู ต้ม",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "36",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27654491_861496444021694_207682792096729626_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดทะเล)",
    FoodPrice: "379",
    IDFoodType: "8",
    FoodTypeName: "เมนู ต้ม",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "37",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27540288_861496464021692_2166585713836766700_n.jpg",
    FoodName: "แจ่งฮ้อน (ชุดรวม)",
    FoodPrice: "399",
    IDFoodType: "8",
    FoodTypeName: "เมนู ต้ม",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "67",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27867707_872851552886183_8148236937003520823_n.jpg",
    FoodName: "น้ำสต๊อกแจ่วฮ้อน",
    FoodPrice: "60",
    IDFoodType: "1",
    FoodTypeName: "อาหารว่าง",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    {
    IDFood: "68",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27973117_872851556219516_7482144630501419580_n.jpg",
    FoodName: "น้ำจิ้มแจ่วแบบขม",
    FoodPrice: "30",
    IDFoodType: "1",
    FoodTypeName: "อาหารว่าง",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    }
    ],
    Normalmenu: [
    {
    IDFood: "69",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/28166720_872851566219515_201760074857828810_n.jpg",
    FoodName: "น้ำจิ้มแบบปวหวาน",
    FoodPrice: "30",
    IDFoodType: "9",
    FoodTypeName: "ประเภทน้ำจิ้ม",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "23"
    }
    ]
    }
    }
```

####  Response example (Error)
```json
{
success: true,
data: {
restaurant: false,
RecommendedMenu: [ ],
Normalmenu: [ ]
}
}
```

<div class="page-break" />



<div id="review_get_by_id">

###  review (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apireviewres/listreviewres/:id |
| HTTP METHOD | GET                      |



####  Request example
```json
http://udonfooddelivery.xyz/backend/apireviewres/listreviewres?id=23
```
####  Response example (Success)
```json
{
success: true,
data: [
{
IDResReview: "29",
ResReviewDate: "2018-03-02 03:32:51",
ResReviewScore: "3",
ResComment: "ระรดเา",
ResReviewImage: "http://udonfooddelivery.xyz/uploads/images/Resreview/reviewimg2018-03-01_20-32-52.png",
IDRestaurant: "23",
IDCustomer: "2",
CustomerFName: "ใจดี",
CustomerLName: "ดีใจ"
},
{
IDResReview: "39",
ResReviewDate: "2018-03-05 13:28:57",
ResReviewScore: "5",
ResComment: "ทำไมสั่งไม่ได้ๆๆๆๆ",
ResReviewImage: "http://udonfooddelivery.xyz/uploads/images/Resreview/reviewimg2018-03-05_06-28-59.png",
IDRestaurant: "23",
IDCustomer: "2",
CustomerFName: "ใจดี",
CustomerLName: "ดีใจ"
}
]
}
```


#### Response example (Error)
```json
{
success: true,
data: [ ]
}
```

<div class="page-break" />


<div id="review_post">

###  review (POST)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apigetreviewres/insertresreview |
| HTTP METHOD | POST                     |



####  Request example
```json
http://udonfooddelivery.xyz/backend/apigetreviewres/insertresreview
```
####  Request example
```json
{
    "id_restaurant": 23,
    "id_customer": 2,
    "res_comment":"ลอง",
    "res_score":3,
    "date":"2018-02-17",
    "imgname":"test",
    "img":"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"
}
  


```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Resreview create successfully."
}
```

####  Response example (Error)
```json
{
    "status": false,
    "data": {
        "IDRestaurant": [
            "รหัสร้านอาหาร is invalid."
        ]
    }
}
```

<div class="page-break" />


<div id="favoritemenu_get_by_id">

### favoritemenu (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apifavoritemenu/listfavoritemenu/:id |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apifavoritemenu/listfavoritemenu?id=2
```


#### Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "res": [
                {
                    "IDRestaurant": "22",
                    "ResImg": "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/ลาบนัว.jpg",
                    "ResName": "ร้านอาหารลาบนัว",
                    "ResLowPrice": "80",
                    "ResAddress": "61/1 1 ต.หมากแข้ง อ.เมือง อุดรธานี 41000",
                    "ResTel": "082-104-1278",
                    "ResTimeStart": "10:00:00",
                    "ResTimeEnd": "23:30:00",
                    "latlng": "17.366247345638175,102.81635080541173",
                    "IDLocation": "3"
                }
            ],
            "favoritefood": [
                {
                    "IDFavoriteManu": "4",
                    "IDFood": "33",
                    "FoodImg": "http://udonfooddelivery.xyz/uploads/images/Food/ลาบนัวอุดร_สาขาเชียงใหม่_-8.jpg",
                    "FoodName": "ส้มตำหอยแครง",
                    "FoodPrice": "130",
                    "IDFoodType": "2",
                    "FoodTypeName": "เมนูส้มตำ",
                    "MenuTypeName": "เมนูแนะนำ",
                    "IDCustomer": "2",
                    "CustomerFName": "ใจดี",
                    "CustomerLName": "ดีใจ"
                }
            ]
        },
        {
            "res": [
                {
                    "IDRestaurant": "25",
                    "ResName": "The Zixga club",
                    "ResAddress": " ถ.ศรีชมชื่น ต.หมากแข้ง อ.เมืองอุดรธานี จ.อุดรธานี 41000 “ประตูหลังโรงเรียนอุดรพิทยานุกูล",
                    "ResStatus": "อนุมัติ",
                    "ResLowPrice": "130",
                    "ResTel": "082-145-6358",
                    "ResTimeStart": "07:00:00",
                    "ResTimeEnd": "19:00:00",
                    "IDLocation": "4",
                    "ResImg": "The-zixga-club2-e1466758663184.jpg",
                    "latlng": "17.408225090890156,102.78665323803716",
                    "LoginType": "เจ้าของร้าน",
                    "IDUser": "21"
                }
            ],
            "favoritefood": [
                {
                    "IDFavoriteManu": "6",
                    "IDFood": "62",
                    "FoodImg": "http://udonfooddelivery.xyz/uploads/images/Food/2fb97366740a45c9b012ea14f01dad77.jpg",
                    "FoodName": "ราเมงต้มยำหมูเด้ง",
                    "FoodPrice": "75",
                    "IDFoodType": "8",
                    "FoodTypeName": "เมนู ต้ม",
                    "MenuTypeName": "เมนูแนะนำ",
                    "IDCustomer": "2",
                    "CustomerFName": "ใจดี",
                    "CustomerLName": "ดีใจ"
                },
                {
                    "IDFavoriteManu": "8",
                    "IDFood": "63",
                    "FoodImg": "http://udonfooddelivery.xyz/uploads/images/Food/43a86c012ed84ef59748efca4d545939.jpg",
                    "FoodName": "คลาสสิคเบอเกอร์หมู",
                    "FoodPrice": "110",
                    "IDFoodType": "1",
                    "FoodTypeName": "อาหารว่าง",
                    "MenuTypeName": "เมนูธรรมดา",
                    "IDCustomer": "2",
                    "CustomerFName": "ใจดี",
                    "CustomerLName": "ดีใจ"
                }
            ]
        },
        {
            "res": [
                {
                    "IDRestaurant": "24",
                    "ResImg": "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/restaurant-puamchok001.jpg",
                    "ResName": "ข้าวต้มเพิ่มโชค",
                    "ResLowPrice": "80",
                    "ResAddress": "ถนนทหาร ตำบลหมากแข้ง อำเภอเมืองอุดรธานี อุดรธานี",
                    "ResTel": "083-058-4386",
                    "ResTimeStart": "17:00:00",
                    "ResTimeEnd": "03:00:00",
                    "latlng": "17.39685095520006,102.7965666825562",
                    "IDLocation": "2"
                }
            ],
            "favoritefood": [
                {
                    "IDFavoriteManu": "7",
                    "IDFood": "39",
                    "FoodImg": "http://udonfooddelivery.xyz/uploads/images/Food/274d49d280634f9aaca6839e90150656.jpg",
                    "FoodName": "เป็ดพะโล้",
                    "FoodPrice": "130",
                    "IDFoodType": "1",
                    "FoodTypeName": "อาหารว่าง",
                    "MenuTypeName": "เมนูธรรมดา",
                    "IDCustomer": "2",
                    "CustomerFName": "ใจดี",
                    "CustomerLName": "ดีใจ"
                }
            ]
        },
        {
            "res": [
                {
                    "IDRestaurant": "38",
                    "ResName": "นายเฮงดีไก่ย่างไม้มะดัน",
                    "ResAddress": "ตรงข้ามราชภัฏอุดรธานี   เทศบาลนครอุดรธานี 41000",
                    "ResStatus": "รออนุมัติ",
                    "ResLowPrice": "100",
                    "ResTel": "099-936-6695",
                    "ResTimeStart": "09:00:00",
                    "ResTimeEnd": "18:00:00",
                    "IDLocation": "3",
                    "ResImg": "iTopPlus904533861267.png",
                    "latlng": "17.39588857461734,102.79778976981083",
                    "LoginType": "เจ้าของร้าน",
                    "IDUser": "34"
                }
            ],
            "favoritefood": [
                {
                    "IDFavoriteManu": "9",
                    "IDFood": "89",
                    "FoodImg": "http://udonfooddelivery.xyz/uploads/images/Food/899d5db790384dbeb12c72391081c220.jpg",
                    "FoodName": "ตำถาด",
                    "FoodPrice": "150",
                    "IDFoodType": "2",
                    "FoodTypeName": "เมนูส้มตำ",
                    "MenuTypeName": "เมนูธรรมดา",
                    "IDCustomer": "2",
                    "CustomerFName": "ใจดี",
                    "CustomerLName": "ดีใจ"
                }
            ]
        }
    ]
}
```

####  Response example (Error)
```json
{
success: true,
data: [ ]
}
```
<div class="page-break" />

<div id="favoritemenu_post">

###  favoritemenu (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apifavoritemenu/insertfavoritemenu  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apifavoritemenu/insertfavoritemenu
```

####  Request example
```json
{
    "idfood": 33,
    "idcustomer": 2
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Favoritemenu create successfully."
}
```

<div class="page-break">

<div id="favoritemenu_delete">

###  favoritemenu (DELETE)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | /apifavoritemenu/deletefavoritemenu/:id  |
| HTTP METHOD | DELETE         |
#### Request example
```json
http://udonfooddelivery.xyz/backend/apifavoritemenu/deletefavoritemenu?idf=29&idc=2
```
####  Response example (Success)
```json
{
    "status": true,
    "data": "Favoritemenu delete successfully."
}
```

####  Response example (Error)
```json
{
    "name": "Not Found",
    "message": "The requested page does not exist.",
    "code": 0,
    "status": 404,
    "type": "yii\\web\\NotFoundHttpException"
}
```

<div class="page-break" />

<div id="order_post">

###  order (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apiorder/insertorder  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiorder/insertorder
```

####  Request example
```json
{
    "date": "2018-03-14",
    "note": "kofigfjo",
    "totalprice": 2,
    "status": "รอการยีนยัน",
    "idpaymant": 1,
    "idcustomer": 2,
    "orderpayprice": 50,
    "idcustomeradd": 2
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Orders create successfully."
}
```

<div class="page-break">

<div id="order_delete">

###  order (DELETE)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | /apiorder/insertorder/:id  |
| HTTP METHOD | DELETE         |
#### Request example
```json
http://udonfooddelivery.xyz/backend/apiorder/insertorder?id=1
```
####  Response example (Success)
```json
{
    "status": true,
    "data": "Orders delete successfully."
}
```

####  Response example (Error)
```json
{
    "name": "Not Found",
    "message": "The requested page does not exist.",
    "code": 0,
    "status": 404,
    "type": "yii\\web\\NotFoundHttpException"
}
```

<div class="page-break" />


<div id="order_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apiorder/listorder |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apiorder/listorder
```


#### Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "IDOrder": "1",
            "OrderDate": "2018-03-14",
            "OrderNote": "ไม่ใส่ผัก ",
            "OrderTotalPrice": "50",
            "OrderStatus": "ยืนยันการสั่งซื้อ",
            "IDOrderDetails": "1",
            "IDDelivery": "1",
            "IDPaymant": "1",
            "IDCustomer": "1",
            "IDEmp": "3",
            "IDCustomerAddress": "5",
            "Orderpayprice": "50"
        }
    ]
}
```

<div class="page-break" />

<div id="customer_post">

###  customer (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apicustomer/insertcustomer2  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apicustomer/insertcustomer2
```

####  Request example
```json
{
    "img": "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",
    "fname": "kmniji",
    "lname": "ddsvdsvd",
    "phone": "024-563-3893",
    "username": "c06",
    "password": "123456",
    "iduserface":  "6414654" ,
     "token":"266262626"

}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Customer create successfully."
}
```

<div class="page-break" />

<div id="customer_post">

###  customer (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apicustomer/insertcustomer  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apicustomer/insertcustomer
```

####  Request example
```json
{
    "phone": "024-563-3893",
    "username": "c06",
    "password": "123456",

}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Customer create successfully."
}
```



<div class="page-break" />


<div id="cusaddress_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apicusaddress/listcusaddress |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apicusaddress/listcusaddress?id=1
```


#### Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "CustomerAddNo": "215",
            "CustomerAddRoad": "ทหาร"
            
        },
        {
            "CustomerAddNo": "557",
            "CustomerAddRoad": "โพศรี"
        }
    ]
}
```


<div class="page-break" />

<div id="orderjing_post">

###  order (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apiorderjing/insertorderjing  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiorderjing/insertorderjing
```

####  Request example
```json
{
	"OrderDate": "2018-03-14",
    "OrderNote": "jguhioj",
    "OrderTotalPrice": "300",
    "OrderStatus": "ยืนยันการสั่งซื้อ",
    "IDPaymant": 1,
    "IDCustomer": 1,
    "IDEmp": 1,
    "IDCustomerAddress": 5,
    "Orderpayprice": "50",
    "DeliveryPrice": 50,
    "IDDeliveryTime": 5,
    "IDDeliveryPro": 4,
    "menu": [
        {
            "IDFood" : 50,
            "IDFoodDetails" : 38,
            "AmountFood" : 2
        },
        {
            "IDFood" : 51,
            "IDFoodDetails" : 39,
            "AmountFood" : 2
        }
    ]
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Orders create successfully."
}
```

<div class="page-break" />

<div id="customer_post">

###  customer (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apiupdatecustomer/updatecustomer  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiupdatecustomer/updatecustomer?id=4
```

####  Request example
```json
{
    "img": "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",
    "imgname": "ลอง",
    "fname": "kmniji",
    "lname": "ddsvdsvd",
    "point": 0,
    "phone": "024-563-3893",
    "username": "c06",
    "password": "123456",
    "type": "ลูกค้า",
   
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Customer update successfully."
}
```


<div class="page-break" />


<div id="orderhistiry_get">

### PROTODAY (GET)
| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apiorderhistiry/listorderhistiry |
| HTTP METHOD | GET                     |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiorderhistory/listorderhistiry?id=1
```
####  Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "order": {
                "IDOrder": "1",
                "OrderDate": "2018-03-14",
                "OrderNote": "ไม่ใส่ผัก ",
                "OrderTotalPrice": "280",
                "OrderStatus": "ยืนยันการสั่งซื้อ",
                "Orderpayprice": "50",
                "PaymentName": "ชำระเงินปลายทาง",
                "EmpFName": "คอม",
                "EmpLname": "เมาส์",
                "CustomerAddNo": "215",
                "CustomerAddRoad": "ทหาร"
            },
            "food": [
                {
                    "IDOrderDetails": "1",
                    "AmountFood": "1",
                    "FoodName": "คิงไซส์ เบอร์เกอร์",
                    "FoodPrice": "150",
                    "FoodImg": "0b2c3263a7c1459da5cc4e855e8c397b.jpg",
                    "IDFoodType": "6",
                    "FoodDetailName": "-",
                    "FoodDetailsPrice": "0"
                },
                {
                    "IDOrderDetails": "6",
                    "AmountFood": "5",
                    "FoodName": "ส้มตำป่า",
                    "FoodPrice": "50",
                    "FoodImg": "ส้มตำ.png",
                    "IDFoodType": "2",
                    "FoodDetailName": "สามารถ เพิ่มเครื่องเคียง ได้ ทุกอย่าง",
                    "FoodDetailsPrice": "30"
                }
            ]
        },
        {
            "order": {
                "IDOrder": "5",
                "OrderDate": "2018-03-14",
                "OrderNote": "ไม่ใส่ผัก ",
                "OrderTotalPrice": "300",
                "OrderStatus": "ยืนยันการสั่งซื้อ",
                "Orderpayprice": "50",
                "PaymentName": "ชำระเงินปลายทาง",
                "EmpFName": "ทะเล",
                "EmpLname": "หายทราย",
                "CustomerAddNo": "215",
                "CustomerAddRoad": "ทหาร"
            },
            "food": [
                {
                    "IDOrderDetails": "3",
                    "AmountFood": "2",
                    "FoodName": "ส้มตำป่า",
                    "FoodPrice": "50",
                    "FoodImg": "ส้มตำ.png",
                    "IDFoodType": "2",
                    "FoodDetailName": "สามารถ เพิ่มเครื่องเคียง ได้ ทุกอย่าง",
                    "FoodDetailsPrice": "30"
                }
            ]
        },
        {
            "order": {
                "IDOrder": "6",
                "OrderDate": "2018-03-14",
                "OrderNote": "jguhioj",
                "OrderTotalPrice": "300",
                "OrderStatus": "ยืนยันการสั่งซื้อ",
                "Orderpayprice": "50",
                "PaymentName": "ชำระเงินปลายทาง",
                "EmpFName": "ทะเล",
                "EmpLname": "หายทราย",
                "CustomerAddNo": "215",
                "CustomerAddRoad": "ทหาร"
            },
            "food": [
                {
                    "IDOrderDetails": "4",
                    "AmountFood": "2",
                    "FoodName": "ไก่ย่าง",
                    "FoodPrice": "120",
                    "FoodImg": "ไก่ย่าง.jpg",
                    "IDFoodType": "7",
                    "FoodDetailName": "-",
                    "FoodDetailsPrice": "0"
                }
            ]
        },
        {
            "order": {
                "IDOrder": "7",
                "OrderDate": "2018-03-14",
                "OrderNote": "jguhioj",
                "OrderTotalPrice": "300",
                "OrderStatus": "ยืนยันการสั่งซื้อ",
                "Orderpayprice": "50",
                "PaymentName": "ชำระเงินปลายทาง",
                "EmpFName": "ทะเล",
                "EmpLname": "หายทราย",
                "CustomerAddNo": "215",
                "CustomerAddRoad": "ทหาร"
            },
            "food": [
                {
                    "IDOrderDetails": "5",
                    "AmountFood": "1",
                    "FoodName": "ไก่ย่าง",
                    "FoodPrice": "120",
                    "FoodImg": "ไก่ย่าง.jpg",
                    "IDFoodType": "7",
                    "FoodDetailName": "-",
                    "FoodDetailsPrice": "0"
                }
            ]
        }
    ]
}
```

<div class="page-break">

<div id="food2_get_by_id">

### food (GET)
| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apitestfood22/listtestfood22/:id |
| HTTP METHOD | GET                     |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apitestfood22/listtestfood22?id=23
```
####  Response example (Success)
```json
    {
    success: true,
    data: {
    restaurant: {
    IDRestaurant: "23",
    ResImg: "http://udonfooddelivery.xyz/uploads/images/Restaurantimg/27541067_861024347402237_6075913401979494982_n.jpg",
    ResName: "แจ่วฮ้อนเมืองอุดร",
    ResLowPrice: "258",
    ResAddress: "แยก, ทางหลวงชนบท อุดรธานี 3191 ตำบล หนองขอนกว้าง อำเภอเมืองอุดรธานี อุดรธานี 41000",
    ResTel: "093-321-4501",
    ResTimeStart: "10:00:00",
    ResTimeEnd: "23:00:00",
    latlng: "17.366185906970095,102.81580589733949",
    IDLocation: "2"
    },
    RecommendedMenu: [
    {
    menu: {
    IDFood: "34",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27657222_861496397355032_6626810527092375231_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดหมู)",
    FoodPrice: "259",
    IDFoodType: "6",
    FoodTypeName: "เมนูแกง ต้มยำ",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: null
    },
    {
    menu: {
    IDFood: "35",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27655234_861496420688363_8968836187597220580_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดโพนยางคำ)",
    FoodPrice: "299",
    IDFoodType: "8",
    FoodTypeName: "เมนู ต้ม",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: null
    },
    {
    menu: {
    IDFood: "36",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27654491_861496444021694_207682792096729626_n.jpg",
    FoodName: "แจ่วฮ้อน (ชุดทะเล)",
    FoodPrice: "379",
    IDFoodType: "8",
    FoodTypeName: "เมนู ต้ม",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: null
    },
    {
    menu: {
    IDFood: "37",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27540288_861496464021692_2166585713836766700_n.jpg",
    FoodName: "แจ่งฮ้อน (ชุดรวม)",
    FoodPrice: "399",
    IDFoodType: "8",
    FoodTypeName: "เมนู ต้ม",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: null
    },
    {
    menu: {
    IDFood: "67",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27867707_872851552886183_8148236937003520823_n.jpg",
    FoodName: "น้ำสต๊อกแจ่วฮ้อน",
    FoodPrice: "60",
    IDFoodType: "1",
    FoodTypeName: "อาหารว่าง",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: {
    IDFoodDetails: "55",
    FoodDetailName: "ขวดใหญ่",
    FoodDetailsPrice: "100"
    }
    },
    {
    menu: {
    IDFood: "68",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27973117_872851556219516_7482144630501419580_n.jpg",
    FoodName: "น้ำจิ้มแจ่วแบบขม",
    FoodPrice: "30",
    IDFoodType: "1",
    FoodTypeName: "อาหารว่าง",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: {
    IDFoodDetails: "56",
    FoodDetailName: "ขวดใหญ่",
    FoodDetailsPrice: "60"
    }
    }
    ],
    Normalmenu: {
    0: {
    menu: {
    IDFood: "69",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/28166720_872851566219515_201760074857828810_n.jpg",
    FoodName: "น้ำจิ้มแบบปวหวาน",
    FoodPrice: "30",
    IDFoodType: "9",
    FoodTypeName: "ประเภทน้ำจิ้ม",
    MenuTypeName: "เมนูธรรมดา",
    IDRestaurant: "23"
    },
    detailFood: {
    IDFoodDetails: "57",
    FoodDetailName: "ขวดใหญ่",
    FoodDetailsPrice: "60"
    }
    },
    menu: {
    IDFood: "68",
    FoodImg: "http://udonfooddelivery.xyz/uploads/images/Food/27973117_872851556219516_7482144630501419580_n.jpg",
    FoodName: "น้ำจิ้มแจ่วแบบขม",
    FoodPrice: "30",
    IDFoodType: "1",
    FoodTypeName: "อาหารว่าง",
    MenuTypeName: "เมนูแนะนำ",
    IDRestaurant: "23"
    },
    detailFood: {
    IDFoodDetails: "56",
    FoodDetailName: "ขวดใหญ่",
    FoodDetailsPrice: "60"
    }
    }
    }
    }
```

####  Response example (Error)
```json
{
success: true,
data: {
restaurant: false,
RecommendedMenu: [ ],
Normalmenu: [ ]
}
}
```

<div class="page-break" />

<div id="custimeraddress_post">

###  custimeraddress (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apiinsertcusaddress/insertcustomeraddress  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiinsertcusaddress/insertcustomeraddress
```

####  Request example
```json
{
    "CustomerAddNo": 33,
    "CustomerAddRoad": 2,
    "IDCustomer": 2
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "CustomerAddress create successfully."
}
```

<div class="page-break" />

<div id="custimeraddress_post">

###  custimeraddress (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apiinsertcusaddress/insertcustomeraddressbymap  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiinsertcusaddress/insertcustomeraddressbymap
```

####  Request example
```json
{
    "map": "17.414378205019798,102.78364621125297",
    "IDCustomer": 2
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "CustomerAddressbymap create successfully."
}
```

<div class="page-break">

<div id="custimeraddress_post">

###  custimeraddress (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | updatecusaddress/updatecustomeraddress/:id  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/updatecusaddress/updatecustomeraddress?id=8
```

####  Request example
```json
{
    "CustomerAddNo": 33,
    "CustomerAddRoad": "test2",
    "IDCustomer": 2
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "CustomerAddress update successfully."
}
```

<div class="page-break">

<div class="page-break">

<div id="favoritemenu_delete">

###  favoritemenu (DELETE)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | /apiupdatecusaddress/deletecustomeraddress/:id  |
| HTTP METHOD | DELETE         |
#### Request example
```json
http://udonfooddelivery.xyz/backend/apiupdatecusaddress/deletecustomeraddress?id=8
```
####  Response example (Success)
```json
{
    "status": true,
    "data": "CustomerAddress delete successfully."
}
```

####  Response example (Error)
```json
{
    "name": "Not Found",
    "message": "The requested page does not exist.",
    "code": 0,
    "status": 404,
    "type": "yii\\web\\NotFoundHttpException"
}
```


<div class="page-break" />


<div id="locationall_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apilocation/listlocationall |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apilocation/listlocationall
```


#### Response example (Success)
```json
{
success: true,
data: [
{
IDLocation: "2",
LocationName: "โพศรี",
IDLocationType: "2",
letlng: ""
},
{
IDLocation: "3",
LocationName: "ทหาร",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "4",
LocationName: "เก่าจาน 4",
IDLocationType: "4",
letlng: ""
},
{
IDLocation: "5",
LocationName: "นิตโย",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "6",
LocationName: "ทางหลวงแผ่นดินหมายเลข 210",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "7",
LocationName: "ทางหลวงแผ่นดินหมายเลข 216",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "8",
LocationName: "ทางหลวงแผ่นดินหมายเลข 227",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "9",
LocationName: "ทางหลวงพิเศษหมายเลข 6",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "10",
LocationName: "ถนนมิตรภาพ",
IDLocationType: "3",
letlng: ""
}
]
}
```


<div class="page-break" />


<div id="locationbytype_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apilocation/listlocationbytype |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apilocation/listlocationbytype
```


#### Response example (Success)
```json
{
success: true,
data: {
Alley: [
{
IDLocation: "2",
LocationName: "โพศรี",
IDLocationType: "2",
letlng: ""
}
],
Road: [
{
IDLocation: "3",
LocationName: "ทหาร",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "5",
LocationName: "นิตโย",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "6",
LocationName: "ทางหลวงแผ่นดินหมายเลข 210",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "7",
LocationName: "ทางหลวงแผ่นดินหมายเลข 216",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "8",
LocationName: "ทางหลวงแผ่นดินหมายเลข 227",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "9",
LocationName: "ทางหลวงพิเศษหมายเลข 6",
IDLocationType: "3",
letlng: ""
},
{
IDLocation: "10",
LocationName: "ถนนมิตรภาพ",
IDLocationType: "3",
letlng: ""
}
],
village: [
{
IDLocation: "10",
LocationName: "ถนนมิตรภาพ",
IDLocationType: "3",
letlng: ""
}
]
}
}
```


<div class="page-break" />


<div id="locationbytype_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apideliverypro/listdeliverypro |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apideliverypro/listdeliverypro
```


#### Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "IDDeliveryPro": "2",
            "DeliveryProName": "แลก 20 แต้ม",
            "DeliveryProPiont": "20",
            "DeliveryProPrice": "30",
            "DeliveryProStart": "2018-01-15",
            "DeliveryProEnd": "2018-01-31"
        },
        {
            "IDDeliveryPro": "3",
            "DeliveryProName": "แลก 30 แต้ม",
            "DeliveryProPiont": "30",
            "DeliveryProPrice": "20",
            "DeliveryProStart": "2018-02-16",
            "DeliveryProEnd": "2018-02-28"
        },
        {
            "IDDeliveryPro": "4",
            "DeliveryProName": "ไม่ใช่โปรโมชั่น",
            "DeliveryProPiont": "0",
            "DeliveryProPrice": "50",
            "DeliveryProStart": "2018-02-01",
            "DeliveryProEnd": "2018-02-28"
        }
    ]
}
```

<div class="page-break" />


<div id="locationbytype_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apideliverytime/listdeliverytime |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apideliverytime/listdeliverytime
```


#### Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "IDDeliveryTime": "5",
            "DeliveryTime": "09:00:00"
        },
        {
            "IDDeliveryTime": "6",
            "DeliveryTime": "09:30:00"
        },
        {
            "IDDeliveryTime": "7",
            "DeliveryTime": "10:00:00"
        },
        {
            "IDDeliveryTime": "8",
            "DeliveryTime": "10:30:00"
        },
        {
            "IDDeliveryTime": "9",
            "DeliveryTime": "11:00:00"
        },
        {
            "IDDeliveryTime": "10",
            "DeliveryTime": "11:30:00"
        },
        {
            "IDDeliveryTime": "11",
            "DeliveryTime": "12:00:00"
        },
        {
            "IDDeliveryTime": "12",
            "DeliveryTime": "12:30:00"
        },
        {
            "IDDeliveryTime": "13",
            "DeliveryTime": "13:00:00"
        },
        {
            "IDDeliveryTime": "14",
            "DeliveryTime": "13:30:00"
        },
        {
            "IDDeliveryTime": "15",
            "DeliveryTime": "14:00:00"
        },
        {
            "IDDeliveryTime": "16",
            "DeliveryTime": "14:30:00"
        },
        {
            "IDDeliveryTime": "17",
            "DeliveryTime": "15:00:00"
        },
        {
            "IDDeliveryTime": "18",
            "DeliveryTime": "15:30:00"
        },
        {
            "IDDeliveryTime": "19",
            "DeliveryTime": "16:00:00"
        }
    ]
}
```


<div class="page-break" />

<div id="orderr_post">

###  order (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apiorderr/insertorderr  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apiorderr/insertorderr
```

####  Request example
```json
{ 
   "address": 
   {
    		"mAddressName": "557 โพศรี",
    		"mAddressId": 6,
    		"longitude": 0,
    		"latitude": 0
	},
	"mOrderDate": "2018-04-24 00:56:17",
	"mItems": [
    	{
    		"addOn": 
    		{
        		"FoodDetailName": "เพิ่มขนมจีน",
        		"IDFoodDetails": "15",
        		"selectedIndex": 1,
        		"FoodDetailsPrice": 10,
        		"type": 0
    		},
    		"reason": "jjjjjjjjjjjjjjjjjjjjjjjjjjjj",
    		"mIDFood": "27",
    		"price": 50,
    		"isAdded": "false",
    		"amount": 3,
    		"type": 1
    	},
    	{
    		"addOn": 
    		{
        		"FoodDetailName": "ตัวใหญ่",
        		"IDFoodDetails": "108",
        		"selectedIndex": 1,
        		"FoodDetailsPrice": 20,
        		"type": 0
    		},
    		"reason": "kkkkkkkkkkkkkkkkkkkkkkkkk",
    		"mIDFood": "29",
    		"price": 148,
    		"isAdded": "false",
    		"amount": 3,
    		"type": 1
    	}
	],
	"mRestaurantId": 21,
	"mTotalPrice": 904,
	"mPay": "300",
	"mDeliveryFee": 0,
	"mPaymentType": 2,
	"mPromotionId": 4,
	"mIDDeliveryTime": 5,
	"mPaymentStatus": "false",
	"mCustomerId": 1
}
  
```

####  Response example (Success)
```json
{
    "status": true,
    "data": "Orders create successfully."
}
```


<div class="page-break" />


<div id="locationbytype_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apiorderhistory/listorderhistory?id=1 |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apiorderhistory/listorderhistory?id=1
```


#### Response example (Success)
```json
{
success: true,
data: [
{
order: {
IDOrder: "1",
OrderDate: "2018-03-14",
OrderNote: "ไม่ใส่ผัก ",
OrderTotalPrice: "280",
OrderStatus: "จัดส่งแล้ว",
Orderpayprice: "50",
PaymentName: "ชำระเงินปลายทาง",
EmpFName: "คอม",
EmpLname: "เมาส์",
CustomerAddNo: "215",
CustomerAddRoad: "ทหาร"
},
food: [
{
IDOrderDetails: "6",
AmountFood: "5",
FoodName: "ส้มตำป่า",
FoodPrice: "50",
FoodImg: "ส้มตำ.png",
IDFoodType: "2",
FoodDetailName: "เพิ่มขนมจีน",
FoodDetailsPrice: "10"
}
]
},
{
order: {
IDOrder: "5",
OrderDate: "2018-03-14",
OrderNote: "ไม่ใส่ผัก ",
OrderTotalPrice: "300",
OrderStatus: "จัดส่งแล้ว",
Orderpayprice: "50",
PaymentName: "ชำระเงินปลายทาง",
EmpFName: "ทะเล",
EmpLname: "หายทราย",
CustomerAddNo: "215",
CustomerAddRoad: "ทหาร"
},
food: [
{
IDOrderDetails: "3",
AmountFood: "2",
FoodName: "ส้มตำป่า",
FoodPrice: "50",
FoodImg: "ส้มตำ.png",
IDFoodType: "2",
FoodDetailName: "เพิ่มขนมจีน",
FoodDetailsPrice: "10"
}
]
}
]
}
```



<div class="page-break" />


<div id="cusaddress_get">

### order (GET)

| Attribute   | Description             |
| ----------- | ----------------------- |
| URL         | /apilistcustomer/listcustomer?id=1 |
| HTTP METHOD | GET                     |

#### Request example
```json
http://udonfooddelivery.xyz/backend/apilistcustomer/listcustomer?id=1
```


#### Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "IDCustomer": "1",
            "CustomerFName": "nopparut",
            "CustomerLName": "yasataro",
            "CustomerImage": "http://udonfooddelivery.xyz/uploads/images/customer/girl.png",
            "CustomerPoint": "15",
            "CustomerPhone": "025-836-9140",
            "CUsername": "c01",
            "CPasswords": "123456",
            "LoginType": "ลูกค้า"
        }
    ]
}
```

<div class="page-break" />

<div id="customerlogin_post">

###  customer (POST)

| Attribute   | Description |
| ----------- | ----------- |
| URL         | apicustomer/customerlogin  |
| HTTP METHOD | POST         |
####  Request example
```json
http://udonfooddelivery.xyz/backend/apicustomer/customerlogin
```

####  Request example
```json
{
	"username": null,
	"pass" : "12346",
	"iduserface": "1",
	"token" : "1551515"
}
  
```

####  Response example (Success)
```json
{
    "success": true,
    "data": [
        {
            "name": {
                "IDCustomer": "1",
                "CustomerFName": "nopparut",
                "CustomerLName": "yasataro",
                "CustomerImage": "http://udonfooddelivery.xyz/uploads/images/Customer/girl.png",
                "CustomerPoint": "15",
                "CustomerPhone": "025-836-9140",
                "CUsername": "c01",
                "CPasswords": "123456",
                "LoginType": "ลูกค้า",
                "email": "noppakit15@gmail.com",
                "iduserface": null,
                "token": null
            },
            "address": [
                {
                    "IDCustomerAddress": "5",
                    "CustomerAddNo": "215",
                    "CustomerAddRoad": "ทหาร",
                    "IDCustomer": "1",
                    "map": null
                },
                {
                    "IDCustomerAddress": "6",
                    "CustomerAddNo": "557",
                    "CustomerAddRoad": "โพศรี",
                    "IDCustomer": "1",
                    "map": null
                },
                {
                    "IDCustomerAddress": "8",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "9",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "10",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "11",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "12",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "13",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "14",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                },
                {
                    "IDCustomerAddress": "15",
                    "CustomerAddNo": null,
                    "CustomerAddRoad": null,
                    "IDCustomer": "1",
                    "map": "0,0"
                }
            ]
        }
    ]
}
```


