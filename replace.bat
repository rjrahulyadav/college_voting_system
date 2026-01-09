@echo off
setlocal enabledelayedexpansion

set "old1=CHMSC Laboratory School Voting System"
set "new1=SONA COLLEGE OF TECHNOLOGY Voting System"
set "old2=Carlos Hilado Memorial State College"
set "new2=SONA COLLEGE OF TECHNOLOGY SALEM TAMIL NADU"
set "old3=Arjun Sharma"
set "new3=Rahul Yadav"

for /r %%f in (*.php) do (
    if exist "%%f" (
        powershell -Command "(Get-Content '%%f') -replace '%old1%', '%new1%' -replace '%old2%', '%new2%' -replace '%old3%', '%new3%' | Set-Content '%%f'"
    )
)
