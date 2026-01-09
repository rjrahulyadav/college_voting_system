@echo off
setlocal enabledelayedexpansion

echo Replacing names with Indian names...

REM Replace college names
set "old1=CHMSC Laboratory School Voting System"
set "new1=SONA COLLEGE OF TECHNOLOGY Voting System"
set "old2=Carlos Hilado Memorial State College"
set "new2=SONA COLLEGE OF TECHNOLOGY SALEM TAMIL NADU"

REM Replace programmer names
set "old3=John Kevin Lorayna"
set "new3=Arjun Sharma"
set "old4=john kevin lorayna"
set "new4=arjun sharma"
set "old5=Rahul Yadav"
set "new5=Arjun Sharma"

REM Replace Western names with Indian names
set "old6=Raphael Victor"
set "new6=Arjun"
set "old7=Mary Ver"
set "new7=Priya"
set "old8=Rowan Jennele"
set "new8=Sneha"
set "old9=Achilles"
set "new9=Vikram"
set "old10=Jeza Marie"
set "new10=Kavya"
set "old11=Ailyn"
set "new11=Ananya"
set "old12=Michelle"
set "new12=Meera"
set "old13=Golda"
set "new13=Pooja"
set "old14=Veronica"
set "new14=Riya"
set "old15=Brian Paul"
set "new15=Rohit"
set "old16=Joneil"
set "new16=Suresh"
set "old17=Cristian"
set "new17=Amit"
set "old18=Jorgielyn"
set "new18=Deepika"
set "old19=Denmark"
set "new19=Karan"
set "old20=Anamae"
set "new20=Anjali"
set "old21=Cristine"
set "new21=Divya"
set "old22=Jerson"
set "new22=Rahul"
set "old23=Anton Victor"
set "new23=Varun"
set "old24=Stephanie"
set "new24=Simran"
set "old25=Dean Martin"
set "new25=Aryan"
set "old26=marven"
set "new26=Manish"
set "old27=jetro"
set "new27=Harsh"
set "old28=jed"
set "new28=Nikhil"
set "old29=kzille"
set "new29=Akash"
set "old30=Freddie"
set "new30=Siddharth"
set "old31=Mark"
set "new31=Aditya"

REM Replace last names
set "old32=Combate"
set "new32=Sharma"
set "old33=Pamposa"
set "new33=Patel"
set "old34=Villamor"
set "new34=Reddy"
set "old35=Palma"
set "new35=Singh"
set "old36=Telmoso"
set "new36=Nair"
set "old37=Tanaleon"
set "new37=Gupta"
set "old38=Nepomuceno"
set "new38=Agarwal"
set "old39=Bianayco"
set "new39=Verma"
set "old40=Sablan"
set "new40=Mishra"
set "old41=Constantino"
set "new41=Yadav"
set "old42=Sausa"
set "new42=Pandey"
set "old43=Serfino"
set "new43=Sinha"
set "old44=Mendoza"
set "new44=Tiwari"
set "old45=Tabiolo"
set "new45=Malhotra"

for /r %%f in (*.php *.html *.sql) do (
    if exist "%%f" (
        echo Processing: %%f
        powershell -Command "(Get-Content '%%f') -replace '%old1%', '%new1%' -replace '%old2%', '%new2%' -replace '%old3%', '%new3%' -replace '%old4%', '%new4%' -replace '%old5%', '%new5%' -replace '%old6%', '%new6%' -replace '%old7%', '%new7%' -replace '%old8%', '%new8%' -replace '%old9%', '%new9%' -replace '%old10%', '%new10%' -replace '%old11%', '%new11%' -replace '%old12%', '%new12%' -replace '%old13%', '%new13%' -replace '%old14%', '%new14%' -replace '%old15%', '%new15%' -replace '%old16%', '%new16%' -replace '%old17%', '%new17%' -replace '%old18%', '%new18%' -replace '%old19%', '%new19%' -replace '%old20%', '%new20%' -replace '%old21%', '%new21%' -replace '%old22%', '%new22%' -replace '%old23%', '%new23%' -replace '%old24%', '%new24%' -replace '%old25%', '%new25%' -replace '%old26%', '%new26%' -replace '%old27%', '%new27%' -replace '%old28%', '%new28%' -replace '%old29%', '%new29%' -replace '%old30%', '%new30%' -replace '%old31%', '%new31%' -replace '%old32%', '%new32%' -replace '%old33%', '%new33%' -replace '%old34%', '%new34%' -replace '%old35%', '%new35%' -replace '%old36%', '%new36%' -replace '%old37%', '%new37%' -replace '%old38%', '%new38%' -replace '%old39%', '%new39%' -replace '%old40%', '%new40%' -replace '%old41%', '%new41%' -replace '%old42%', '%new42%' -replace '%old43%', '%new43%' -replace '%old44%', '%new44%' -replace '%old45%', '%new45%' | Set-Content '%%f'"
    )
)

echo.
echo Name replacement completed!
echo All Western names have been replaced with Indian names.
pause