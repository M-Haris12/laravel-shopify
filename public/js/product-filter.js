//var html_product='<li class=\"grid__item grid__item small--one-half medium-up--one-third\">\r\n    <div class=\"grid-view-item product-card\">\r\n        <a class=\"grid-view-item__link grid-view-item__image-container full-width-link\" href=\"\/products\/3-4-sleeve-kimono-dress-coral\">\r\n            <span class=\"visually-hidden\">3\/4 Sleeve Kimono Dress<\/span>\r\n        <\/a>\r\n\r\n        <style>\r\n            @media screen and (min-width: 750px) {\r\n                #ProductCardImage-collection-template-1870940962880 {\r\n                    max-width: 246.2841796875px;\r\n                    max-height: 345px;\r\n                }\r\n                #ProductCardImageWrapper-collection-template-1870940962880 {\r\n                    max-width: 246.2841796875px;\r\n                    max-height: 345px;\r\n                }\r\n            }\r\n            \r\n            @media screen and (max-width: 749px) {\r\n                #ProductCardImage-collection-template-1870940962880 {\r\n                    max-width: 535.400390625px;\r\n                    max-height: 750px;\r\n                }\r\n                #ProductCardImageWrapper-collection-template-1870940962880 {\r\n                    max-width: 535.400390625px;\r\n                }\r\n            }\r\n        <\/style>\r\n\r\n        <div id=\"ProductCardImageWrapper-collection-template-1870940962880\" class=\"grid-view-item__image-wrapper product-card__image-wrapper js\">\r\n            <div style=\"padding-top:140.0820793%;\">\r\n                <img id=\"ProductCardImage-collection-template-1870940962880\" class=\"grid-view-item__image lazyautosizes lazyloaded\" src=\"\/\/cdn.shopify.com\/s\/files\/1\/0039\/7531\/5520\/products\/2015-03-20_Ashley_Look_20_23515_15565_300x300.jpg?v=1545064728\" data-widths=\"[180, 360, 540, 720, 900, 1080, 1296, 1512, 1728, 2048]\">\r\n            <\/div>\r\n        <\/div>\r\n\r\n        <div class=\"h4 grid-view-item__title product-card__title\" aria-hidden=\"true\">3\/4 Sleeve Kimono Dress<\/div>\r\n\r\n        <!-- snippet\/product-price.liquid -->\r\n\r\n        <dl class=\"price\" data-price=\"\">\r\n\r\n            <div class=\"price__vendor\">\r\n                <dt>\r\n<span class=\"visually-hidden\">Vendor<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    Antoni &amp; Alison\r\n                <\/dd>\r\n            <\/div>\r\n\r\n            <div class=\"price__regular\">\r\n                <dt>\r\n<span class=\"visually-hidden visually-hidden--inline\">Regular price<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    <span class=\"nxb-exvat price-item price-item--regular\" data-regular-price=\"\">\r\n\r\nExc-Vat Rs.551.60\r\n\r\n<\/span>\r\n\r\n                    <span style=\"display:none;\" class=\"nxb-invat price-item price-item--regular\" data-sale-price=\"\">\r\n\r\nInc-Vat Rs.639.856\r\n\r\n<\/span>\r\n\r\n                <\/dd>\r\n            <\/div>\r\n            <div class=\"price__sale\">\r\n                <dt>\r\n<span class=\"visually-hidden visually-hidden--inline\">Sale price<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    <span class=\"nxb-exvat price-item price-item--sale\" data-sale-price=\"\">\r\nExc-Vat Rs.551.60\r\n<\/span>\r\n\r\n                    <span style=\"display:none;\" class=\"nxb-invat price-item price-item--sale \" data-sale-price=\"\">\r\n\r\nInc-Vat Rs.639.856 \r\n\r\n<\/span>\r\n\r\n                    <span class=\"price-item__label\" aria-hidden=\"true\">Sale<\/span>\r\n                <\/dd>\r\n            <\/div>\r\n        <\/dl>\r\n\r\n    <\/div>\r\n\r\n<\/li>';

//console.log(html_product);
var a = 5;
var b = 10;
var str=`<li class=\"grid__item grid__item small--one-half medium-up--one-third\">\r\n    <div class=\"grid-view-item product-card\">\r\n        <a class=\"grid-view-item__link grid-view-item__image-container full-width-link\" href=\"\/products\/#{data[key]['handle']}\">\r\n            <span class=\"visually-hidden\">#{this.title}<\/span>\r\n        <\/a>\r\n\r\n        <style>\r\n            @media screen and (min-width: 750px) {\r\n                #ProductCardImage-collection-template-1870940962880 {\r\n                    max-width: 246.2841796875px;\r\n                    max-height: 345px;\r\n                }\r\n                #ProductCardImageWrapper-collection-template-1870940962880 {\r\n                    max-width: 246.2841796875px;\r\n                    max-height: 345px;\r\n                }\r\n            }\r\n            \r\n            @media screen and (max-width: 749px) {\r\n                #ProductCardImage-collection-template-1870940962880 {\r\n                    max-width: 535.400390625px;\r\n                    max-height: 750px;\r\n                }\r\n                #ProductCardImageWrapper-collection-template-1870940962880 {\r\n                    max-width: 535.400390625px;\r\n                }\r\n            }\r\n        <\/style>\r\n\r\n        <div id=\"ProductCardImageWrapper-collection-template-#{this.id}\" class=\"grid-view-item__image-wrapper product-card__image-wrapper js\">\r\n            <div style=\"padding-top:140.0820793%;\">\r\n                <img id=\"ProductCardImage-collection-template-#{this.id}\" class=\"grid-view-item__image lazyautosizes lazyloaded\" src=\"#{this.image.src}\" data-widths=\"[180, 360, 540, 720, 900, 1080, 1296, 1512, 1728, 2048]\">\r\n            <\/div>\r\n        <\/div>\r\n\r\n        <div class=\"h4 grid-view-item__title product-card__title\" aria-hidden=\"true\">#{this.title}<\/div>\r\n\r\n        <!-- snippet\/product-price.liquid -->\r\n\r\n        <dl class=\"price\" data-price=\"\">\r\n\r\n            <div class=\"price__vendor\">\r\n                <dt>\r\n<span class=\"visually-hidden\">Vendor<\/span>\r\n<\/dt>\r\n                <dd>\r\n                   #{this.vendor}\r\n                <\/dd>\r\n            <\/div>\r\n\r\n            <div class=\"price__regular\">\r\n                <dt>\r\n<span class=\"visually-hidden visually-hidden--inline\">Regular price<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    <span class=\"nxb-exvat price-item price-item--regular\" data-regular-price=\"\">\r\n\r\nExc-Vat Rs.551.60\r\n\r\n<\/span>\r\n\r\n                    <span style=\"display:none;\" class=\"nxb-invat price-item price-item--regular\" data-sale-price=\"\">\r\n\r\nInc-Vat Rs.639.856\r\n\r\n<\/span>\r\n\r\n                <\/dd>\r\n            <\/div>\r\n            <div class=\"price__sale\">\r\n                <dt>\r\n<span class=\"visually-hidden visually-hidden--inline\">Sale price<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    <span class=\"nxb-exvat price-item price-item--sale\" data-sale-price=\"\">\r\nExc-Vat Rs.551.60\r\n<\/span>\r\n\r\n                    <span style=\"display:none;\" class=\"nxb-invat price-item price-item--sale \" data-sale-price=\"\">\r\n\r\nInc-Vat Rs.639.856 \r\n\r\n<\/span>\r\n\r\n                    <span class=\"price-item__label\" aria-hidden=\"true\">Sale<\/span>\r\n                <\/dd>\r\n            <\/div>\r\n        <\/dl>\r\n\r\n    <\/div>\r\n\r\n<\/li>`;
str=str.replace(/#/g,'$' ) ;
console.log(str);
$(document).ready(function(){ 
    
  //console.log($("ul.grid grid--uniform grid--view-items").html();
/* console.log(window.location.pathname);
var str= window.location.pathname;
if(str.includes("/collections/all")){
  alert("You are on collection page");
} */
$.ajax({ 
  type: 'GET', 
  url: 'https://nxbcommercepk.myshopify.com/apps/test-app', 
  data: { price_from: 10, price_to : 1000 }, 
 
  success: function (data) { 
    data=JSON.parse(data);
    //console.log(data[0]['title']);
  //  console.log(data);
   $.each(data, function (key,value) {
      console.log(data[key]['title']);
     // console.log('First Name   ${a+b}' );
     //console.log(` ${this.title}`);
    //  console.log("Last Name: " + this.handle);
    //  console.log(" ");
            var html_product=`<li class=\"grid__item grid__item small--one-half medium-up--one-third\">\r\n    <div class=\"grid-view-item product-card\">\r\n        <a class=\"grid-view-item__link grid-view-item__image-container full-width-link\" href=\"\/products\/${product.handle}\">\r\n            <span class=\"visually-hidden\">${product.title}<\/span>\r\n        <\/a>\r\n\r\n        <style>\r\n            @media screen and (min-width: 750px) {\r\n                #ProductCardImage-collection-template-1870940962880 {\r\n                    max-width: 246.2841796875px;\r\n                    max-height: 345px;\r\n                }\r\n                #ProductCardImageWrapper-collection-template-1870940962880 {\r\n                    max-width: 246.2841796875px;\r\n                    max-height: 345px;\r\n                }\r\n            }\r\n            \r\n            @media screen and (max-width: 749px) {\r\n                #ProductCardImage-collection-template-1870940962880 {\r\n                    max-width: 535.400390625px;\r\n                    max-height: 750px;\r\n                }\r\n                #ProductCardImageWrapper-collection-template-1870940962880 {\r\n                    max-width: 535.400390625px;\r\n                }\r\n            }\r\n        <\/style>\r\n\r\n        <div id=\"ProductCardImageWrapper-collection-template-${product.id}\" class=\"grid-view-item__image-wrapper product-card__image-wrapper js\">\r\n            <div style=\"padding-top:140.0820793%;\">\r\n                <img id=\"ProductCardImage-collection-template-${product.id}\" class=\"grid-view-item__image lazyautosizes lazyloaded\" src=\"${product.image.src}\" data-widths=\"[180, 360, 540, 720, 900, 1080, 1296, 1512, 1728, 2048]\">\r\n            <\/div>\r\n        <\/div>\r\n\r\n        <div class=\"h4 grid-view-item__title product-card__title\" aria-hidden=\"true\">${product.title}<\/div>\r\n\r\n        <!-- snippet\/product-price.liquid -->\r\n\r\n        <dl class=\"price\" data-price=\"\">\r\n\r\n            <div class=\"price__vendor\">\r\n                <dt>\r\n<span class=\"visually-hidden\">Vendor<\/span>\r\n<\/dt>\r\n                <dd>\r\n                   ${product.vendor}\r\n                <\/dd>\r\n            <\/div>\r\n\r\n            <div class=\"price__regular\">\r\n                <dt>\r\n<span class=\"visually-hidden visually-hidden--inline\">Regular price<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    <span class=\"nxb-exvat price-item price-item--regular\" data-regular-price=\"\">\r\n\r\nExc-Vat Rs.551.60\r\n\r\n<\/span>\r\n\r\n                    <span style=\"display:none;\" class=\"nxb-invat price-item price-item--regular\" data-sale-price=\"\">\r\n\r\nInc-Vat Rs.639.856\r\n\r\n<\/span>\r\n\r\n                <\/dd>\r\n            <\/div>\r\n            <div class=\"price__sale\">\r\n                <dt>\r\n<span class=\"visually-hidden visually-hidden--inline\">Sale price<\/span>\r\n<\/dt>\r\n                <dd>\r\n                    <span class=\"nxb-exvat price-item price-item--sale\" data-sale-price=\"\">\r\nExc-Vat Rs.551.60\r\n<\/span>\r\n\r\n                    <span style=\"display:none;\" class=\"nxb-invat price-item price-item--sale \" data-sale-price=\"\">\r\n\r\nInc-Vat Rs.639.856 \r\n\r\n<\/span>\r\n\r\n                    <span class=\"price-item__label\" aria-hidden=\"true\">Sale<\/span>\r\n                <\/dd>\r\n            <\/div>\r\n        <\/dl>\r\n\r\n    <\/div>\r\n\r\n<\/li>`;
            // console.log(html_product);
    });
  }
});





});  
