function search(){
    let searchBar = document.querySelector('.search-input').value.toUpperCase();
    let productList = document.querySelector('.cart_cts');
    let product = document.querySelectorAll('.cart_ct');
    let productName = document.querySelectorAll('.ct .description h4 a');
  
    for(let i=0 ; i<productName.length ; i++){
        let productText = productName[i].textContent.toUpperCase();
        if(productText.indexOf(searchBar) >= 0){
            product[i].style.display = "";
        }else{
            product[i].style.display = "none";
        }
    }
}
