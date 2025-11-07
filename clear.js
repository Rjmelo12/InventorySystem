document.getElementById('clearContent').addEventListener('click', function(event) {
    event.preventDefault();

document.getElementById('ProductID').value = '';
document.getElementById('Product Name').value = '';
document.getElementById('Category').value = '';
document.getElementById('Price').value = '';
document.getElementById('Stock').value = '';




});


   document.getElementById('clearContent').addEventListener('click', function() {
       document.getElementById('Product ID').value = '';
       document.getElementById('Product Name').value = '';
       document.getElementById('Category').value = '';
       document.getElementById('Price').value = '';
       document.getElementById('Stock').value = '';
   });
