$('#formulario').submit(function(e) { 
  /*console.log('submiting');
   const articulo = {
        id : $('#id').val(),
        nombre : $('#nombre').val(),
        precio : $('#precio').val(),
        stock : $('#stock').val(),
        cantidad : $('#cantidad').val()
   };*/   
   e.preventDefault();
      $.ajax({
        url: 'controller/agregar.php',
        type: 'GET',
        success: function (response) {
          let tabla = JSON.parse(response); 
          let template ='';
            tabla.forEach(tabla => {
               template += `
                   <tr>
                      <td>${tabla.id}</td>
                      <td>${tabla.nombre}</td>  
                      <td>${tabla.precio}</td>  
                      <td>${tabla.stock}</td>  
                      <td>${tabla.cantidad}</td>          
                   </tr>  
               `   
            });
             $('#tabla').html(template);
          
        } 
        
      })
      
  
})


