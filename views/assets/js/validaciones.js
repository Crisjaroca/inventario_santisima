

// Validar solo Numero en Inputs
function validaNumericos(event) {
    
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
    }
    
    return false;        
}
