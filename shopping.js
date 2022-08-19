var items = [
    ['https://hinawi.co.il/wp-content/uploads/2020/10/20200808_142220-768x817.jpg',9.99 ,'Milk'],
    ['https://konimboimages.s3.amazonaws.com/system/photos/4760210/original/8de0aa62e14736fc267fc119ac696a1d.jpg',18.00,'Cheese'],
    ['https://ynet-images1.yit.co.il/PicServer5/2018/01/17/8287081/6.jpg',14.99,'Protein yogurt'],
    ['https://m.pricez.co.il/ProductPictures/200x/7296073078975.jpg',20.00,'Rice cakes'],
    ['https://www.bsweet.co.il/images/itempics/5383_23102020222918_large.jpg',13.99,'Chocolate'],
    ['https://www.berman.co.il/wp-content/uploads/2020/04/%D7%9C%D7%97%D7%9E%D7%99%D7%9D-%D7%A7%D7%9C%D7%90%D7%A1%D7%99%D7%9D_0003_%D7%90%D7%97%D7%99%D7%93-%D7%A4%D7%A8%D7%95%D7%A1-497112.jpg',25.99,'Breads'],
    ['https://konimboimages.s3.amazonaws.com/system/photos/4760210/original/8de0aa62e14736fc267fc119ac696a1d.jpg',10.00,'Coca-cola'],
    ['https://www.ktzat.co.il/ProductsImages/H993203.jpg',12.00,'Water - small bottle']
];

var cartItems = [];

function run(){
    var main = document.getElementById('products');
    // all elements to be added 
    for(var i=0; i<items.length; i++){
        var ele = document.createElement('li');
        var pic = document.createElement('img');
        var price = document.createElement('h1');
        var desc = document.createElement('h2');
        var add = document.createElement('button');
        var typeBox = document.createElement('input');

        // push elements into HTML
        main.appendChild(ele);
        ele.appendChild(pic);
        ele.appendChild(desc);
        ele.appendChild(price);
        ele.appendChild(typeBox);
        ele.appendChild(add);

        // edit pushed elements info from array
        pic.src = items[i][0];
        price.innerHTML = 'ש"ח ' + items[i][1];
        desc.innerHTML = items[i][2];

        add.innerHTML = 'add';
        typeBox.type = 'number'

        typeBox.setAttribute("id", "input" + i);
        typeBox.value = 1;

        add.dataset.cartIndex = i;
        add.addEventListener('click', adding, false)
    }
}
function adding(event){
    const NUM = event.currentTarget.dataset.cartIndex;
    cartItems.push([items[NUM]]);
    cartItems[cartItems.length-1][1] = Number(document.getElementById('input'+NUM).value);

    updateCart();
}
    
var totalItems = 0;

function updateCart(){
    var itemCounter = document.getElementById('itemCount');

    totalItems = 0;

    window.sessionStorage.setItem('cartItems',
    JSON.stringify(cartItems));

    var data=sessionStorage.getItem('cartItems');
    data = JSON.parse(data);

    cartItems = data; 

    for(var i = 0; i < cartItems.length; i++){
        totalItems += cartItems[i][1];
    }


    itemCounter.innerHTML = totalItems;
}

function loadCart(){ // loading products on cart page
    var main = document.getElementById('cartProducts');
    // all elements to be added 

    var data=sessionStorage.getItem('cartItems');
    data = JSON.parse(data);

    cartItems = data;

    updateCart();

    for(var i=0; i<cartItems.length; i++){
        var ele = document.createElement('li');
        var pic = document.createElement('img');
        var price = document.createElement('h1');
        var desc = document.createElement('h2');
        var deleteItem = document.createElement('button');
        var amount = document.createElement('h2');
        var subtotal = document.createElement('h3');
    
        // push elements into HTML
        main.appendChild(ele);
        ele.appendChild(pic);
        ele.appendChild(price);
        ele.appendChild(desc);
       
        ele.appendChild(amount);
        ele.appendChild(subtotal);
        ele.appendChild(deleteItem);
        // edit pushed elements info from array
        pic.src = cartItems[i][0][0] ;
        price.innerHTML = 'ש"ח ' + cartItems[i][0][1];
        desc.innerHTML = cartItems[i][0][2];
        deleteItem.innerHTML = 'Delete';
        deleteItem.dataset.cartIndex = i;
        deleteItem.addEventListener('click', deleteMe, false);
        deleteItem.setAttribute("id", "deletePro");

        amount.innerHTML = ' -> Amount of this product: ' + cartItems[i][1];
        subtotal.innerHTML = 'ש"ח '+ cartItems[i][1] * cartItems[i][0][1];
    }
}

function deleteMe() {
    const NUM = event.currentTarget.dataset.cartIndex;

    delete cartItems[NUM];

    cartItems = cartItems.filter(item => item !== undefined);
    updateCart();
    loadCart();
    window.location.reload(true);
}

    document.getElementById("open-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")
        [0].classList.add("active");
    });

    document.getElementById("dismiss-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")
        [0].classList.remove("active");
    });