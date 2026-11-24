$content = Get-Content 'C:/xampp/htdocs/Website_Pesantren/design-reference/stitch_modern_pesantren_bi_dashboard/beranda_publik_pp_damanhuri_romly_2026/code.html' -Raw
$matches = [regex]::Matches($content, 'src="(https://lh3\.googleusercontent\.com[^"]+)"')
$urls = $matches | ForEach-Object { $_.Groups[1].Value } | Select-Object -Unique
$i = 0
foreach ($url in $urls) {
    $i++
    Write-Output "$i`: $url"
}
