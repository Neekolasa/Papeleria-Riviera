function gestor_recursos(privilegio) 
  {
    if (privilegio=='user') 
    {
      $('.admin').css('display', 'none');
      
    }
    else if (privilegio=='admin') 
    {
      $('.admin').css('display', 'block');
    }
    
  }