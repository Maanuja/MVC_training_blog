function mdp()
{
  var passwordInput = document.getElementById('mdp');
  var passStatus = document.getElementById('pass-status-mdpco');
  
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye-slash';
  }
}
document.getElementById("myBtn").onclick = function ()
{
  location.href = "index.php";
};