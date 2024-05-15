 // Get the select element
 const selectElement = document.getElementById('jesuisSelect');
 // Get the input element
 const inputElement = document.getElementById('exampleInputPassword3');

 // Add event listener to the select element
 selectElement.addEventListener('change', function() {
   // Check the selected option
   if (selectElement.value === 'Staff administratif' || selectElement.value === 'Enseignant') {
     // Disable the input field
     inputElement.disabled = true;
   } else {
     // Enable the input field
     inputElement.disabled = false;
   }
 });