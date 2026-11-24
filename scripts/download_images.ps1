$dest = 'c:/xampp/htdocs/Website_Pesantren/public/images/stitch'
if (-Not (Test-Path $dest)) { New-Item -ItemType Directory -Path $dest | Out-Null }
$i = 1
Get-ChildItem -Recurse -Path 'c:/xampp/htdocs/Website_Pesantren/design-reference' -Include *.html | Select-String -Pattern 'https://lh3\.googleusercontent\.com[^"\']+' -AllMatches | ForEach-Object {
    foreach ($m in $_.Matches) {
        $url = $m.Value
        $ext = [System.IO.Path]::GetExtension($url)
        if (-not $ext) { $ext = '.jpg' }
        $filename = "image_$i$ext"
        Write-Host "Downloading $url to $dest\\$filename"
        Invoke-WebRequest -Uri $url -OutFile (Join-Path $dest $filename) -ErrorAction SilentlyContinue
        $i++
    }
}
