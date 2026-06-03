# Helper script to export and merge local XAMPP databases (quiz_db and quiz_db_en) into a single SQL file

$dumpPath = "C:\xampp\mysql\bin\mysqldump.exe"
$outputFile = "database/database_dump.sql"

# Ensure database directory exists
if (-not (Test-Path "database")) {
    New-Item -ItemType Directory -Path "database" | Out-Null
}

Write-Host "==========================================" -ForegroundColor Green
Write-Host " Saudi Culture - Database Merger & Exporter " -ForegroundColor Green
Write-Host "==========================================" -ForegroundColor Green

# 1. Check if mysqldump exists
if (-not (Test-Path $dumpPath)) {
    Write-Error "Could not find mysqldump at $dumpPath. Please ensure XAMPP is installed at C:\xampp."
    exit
}

# 2. Check if MySQL is running on port 3306
$tcpConnection = Get-NetTCPConnection -LocalPort 3306 -ErrorAction SilentlyContinue
if ($null -eq $tcpConnection) {
    Write-Warning "MySQL does not appear to be running on port 3306."
    Write-Host "Please start MySQL from the XAMPP Control Panel first, then run this script again." -ForegroundColor Yellow
    exit
}

Write-Host "MySQL is running. Exporting databases..." -ForegroundColor Cyan

# 3. Export quiz_db (Arabic tables, users, results)
Write-Host "Exporting quiz_db..." -ForegroundColor Cyan
& $dumpPath -u root quiz_db > temp_ar.sql 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Warning "Exporting quiz_db failed. Trying with empty password..."
    & $dumpPath -u root -p"" quiz_db > temp_ar.sql 2>$null
}

# 4. Export quiz_db_en (English tables, results)
Write-Host "Exporting quiz_db_en..." -ForegroundColor Cyan
& $dumpPath -u root quiz_db_en > temp_en.sql 2>$null
if ($LASTEXITCODE -ne 0) {
    & $dumpPath -u root -p"" quiz_db_en > temp_en.sql 2>$null
}

# 5. Merge files and clean up
if ((Test-Path temp_ar.sql) -and (Test-Path temp_en.sql)) {
    Write-Host "Merging exports into $outputFile..." -ForegroundColor Cyan
    
    # Write a header
    $header = @"
-- ========================================================
-- Saudi Culture Merged Database Dump
-- Contains tables from both quiz_db and quiz_db_en
-- Combined for single cloud database deployment
-- ========================================================

"@
    Set-Content -Path $outputFile -Value $header -Encoding UTF8
    
    # Append both dumps
    Get-Content temp_ar.sql | Add-Content $outputFile -Encoding UTF8
    Get-Content temp_en.sql | Add-Content $outputFile -Encoding UTF8
    
    # Remove temp files
    Remove-Item temp_ar.sql -Force
    Remove-Item temp_en.sql -Force
    
    Write-Host "SUCCESS! Database exported and merged successfully to $outputFile." -ForegroundColor Green
    Write-Host "You can now upload $outputFile to your cloud database." -ForegroundColor Green
} else {
    Write-Error "Database export failed. Ensure your local databases (quiz_db and quiz_db_en) exist in XAMPP."
}
