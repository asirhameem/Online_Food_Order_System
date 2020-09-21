function AddToCart() {
    var addToCart = document.getElementsById('itemName').innerHTML;
    console.log(addToCart);

    for (var i = 0; i < 5; i++) {
        var title = document.getElementsByClassName('itemName')[i].innerHTML;
        console.log(title);

    }
}
