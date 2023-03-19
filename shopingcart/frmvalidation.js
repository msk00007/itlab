function formvalidation()
{
//email validation
flag=true; 
if(f1.email.value=="")
flag=false;

var Str=f1.email.value; 
if(allValidChars(Str))
   for(i=0;i<Str.length;i++)

       if(Str.charAt(i)=="@")
       {

if((Str.substr(i+1,9)=="yahoo.com")||(Str.substr(i+1,9)=="gmail.com"))
{
flag=true;

break;
}

}
else
flag=false;

if(!(flag))
{

alert("Please enter a valid Email ID");
f1.email.focus();
return false;

}
//Password Validation 
if(f1.psd.value.length<6)
{

alert("Please enter Password not less than 6"); f1.psd.focus();

return false;
}
if(!(f1.psd.value==f1.psd.value))

{

alert("Please re-enter corrert Password"); f1.psd1.focus();
 
return false;
}

}
function allValidChars(email)

{

var validchars = "abcdefghijklmnopqrstuvwxyz0123456789@.-_";
 for (i=0; i < email.length; i++)

{

var letter = email.charAt(i).toLowerCase(); 
if (validchars.indexOf(letter) == -1)
return false;
} return true; 

}
