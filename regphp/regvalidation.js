function frmvalidation()
{

//Username Validation 
if(f1.name.value=="")
{
alert("You must enter a User Name"); f1.name.focus();

return false;
}
if(f1.name.value.length<3)

{

alert("User Name must consist of atleast 3 character"); f1.name.focus();

return false;

}

var checkStr=f1.name.value; 
for(i=0;i<checkStr.length;i++)

if(!(checkStr.charCodeAt(i)>=65&&checkStr.charCodeAt(i)<=91)
&& !(checkStr.charCodeAt(i)>=97 && checkStr.charCodeAt(i)<=122))

{

alert("Please enter valid User Name"); 
f1.name.focus();

return false;
}

//Password Validation
 


if(f1.psd.value.length<6)
{

alert("Please enter Password not less than 6"); 
f1.psd.focus();

return false;
}
if(!(f1.psd.value==f1.psd.value))

{

alert("Please re-enter corrert Password"); 
f1.psd1.focus();

return false;
}

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

//phone number validation 
flag=true; 
if(f1.phno.value.length!=10)

flag=false;

var phno=f1.phno.value; 
for(i=0;i<phno.length;i++)

if(!(phno.charCodeAt(i)>=48&&phno.charCodeAt(i)<=57))
flag=false;

if(!flag)
{

alert("Please enter valid Phone Number");
 f1.phno.focus();

return false;

}

//gender validation 
flag=false;

for(i=0;i<f1.gender.length;i++)
if(f1.gender[i].checked)

flag=true;
if(!(flag))
 

{

alert("Please choose a Gender");
 return false;

}

//Date of birth validation 
if((f1.date.selectedIndex<=0)||(f1.month.selectedIndex<=0)||(f1.year.selectedIndex<=0))
{

alert("Please choose a Date of Birth"); f1.phno.focus();

return false;
}

//checkbox validation 
flag=false;

for (i = 0;  i < f1.lang.length;  i++)

{

if (f1.lang[i].checked) flag = true;

}
if(!(flag))

{

alert("Please select at least one of the \"Language\" options."); return false;

}

//address validation 
if(f1.address.value.length<25)

{

alert("Please enter a Correct Address"); 
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


