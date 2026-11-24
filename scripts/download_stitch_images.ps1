$dest = 'C:/xampp/htdocs/Website_Pesantren/public/images/stitch'

$images = @{
    'profile-header.jpg' = 'https://lh3.googleusercontent.com/aida/ALJJyrAMO2VU7Y3LkDJ035tqubR9ZRdrChr8Qv6F3vQD-dYGmTYT6cR3PDc2gOZZXrmHLsWCpkxZp4qD66kc6Oa-lMNycZE0z2Bjge9oDqVzUOVEYxIQQzSy3zgwiz97tc3YFBBV6ROqga9IEnGeFNPRoXxAqL15znDN4xHsQBPFO0xlj8yY9XmpzARQMuS8CkiFxtrN_HBgm7b8or-uLB14FbRryxOe372LeTv1J3g0fFfQ1Z0cgH7Cqm8Bew'
    'hero-santri.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCEqvPd2IOcTnKjx5qRLao7D7UsfqAzKdiv0paiQcp4VakvV2_e3nqIoegWQqIDQdo12cAM3DCBuZxKadwqStAgjnaJIX8unaj8g9USJ8UCQJ_IBVaFAMfLTinSve1TV0P02GhAGfSas_B7XoAxOz_7yPaLizpZOLohzJHyQeALOIz70u_8fXJElA72-R2JLMKeAsE_KFLUlHAqkE42LTKbYhnWz5w8HumzvHLcCw'
    'kegiatan-1.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDxUHtWQlJr-cTZhhWuEDtBP6plcs2C7LzvDk3UmIC9VtbSG0glFuPhM3H1N0YFifxqug0g3hXkPaY9RjG8fvvGzU9jAr_7bYuwyq2f3PWMHZKy2zrOeEEIe2pRMDBnnAa2GRYMHjYcwAdV4Cnrk6NTQ5HTK4x2pI6aYIaxLHQ_kIgpYJEIotttFCAiM0Ug0lI6cffh4hqPMoUfr0GTQYegBBaa99F0meVQnrxLtQ'
    'kegiatan-2.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDSg19RhldiQeUdK2iyJYbT4yRkYDaLL7DbdpNwKNDKLdseVdtAQMsx8P6METG8RXQPAuYV4MrSDvxRGtrlZGm43nYsLuK8yXY8K8ZMmYsxHtLnmQYJl289rYb8SHUq0No0wcRoi1nm7UxMw1u-NeutJZQZTbc9mAd1xtn2PSnteQVaOaYTeUOoKB-gvsZUq2DN9qUvdYOcMb01WZpx_dsOSUyNjY4KGRgwhH3WLw'
    'kegiatan-3.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAR3VzGaCPWmVsNRFYCiJIdD8TG-O5XwxUcmnBFndFmAJrnK6rx0G_kxiBWgpIfADCNNATNrbLcF_bLYIKy1X8tjTiYbKJYcfKiYpfHo9QGjJLXRA1bOy4YwYyVFCVgTkHnbo1eJCADrxVNdhcf1fd9UDwEaSq4Spc3xhpConVdTs15OqaBTDgU2MPGOCcQypUceBqQTRMosK2ZWuWywrYFg9ZV2siT38heDEKQBQ'
    'kegiatan-4.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuA9Y6n196Wz_4WkGxYibr6_V07v2KrGXSYbXEed-cEpdVKKom9dxrFTALDfKvOoxKdJFYM6sOFLB6wpJ2nbuxaCSiu-ELP61f-U1zX6lU9OhPC0bTFX-zV-UKaiISrhwMmAEu1_RdytCl4_JvnZk-7q0sDG1TNAwx312wXWmATeOSERUKJJmQR4Tj8hqDQovM5FiJGBRsmDVOEmLSRoL7S7N6oLvw6RA1HxmooFWw'
    'kegiatan-5.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuA3dP-mjV_RUGcRZuR_9QJXBhvdy1nFXmFgRFKyvPiPrIJxoMx5g1yYjlhCiD6a1EqKfE4_hzOh4wyJ4s6WotmrklOn0SAkIXWZZB4Lky8YEdagvYWDsEixTI26njW-tIsljgBXWTAY_6iO3mCj8I1nI2iwGuzvnerJ6zK2ieboFmZl5xSAmEY1q5fFOnJtolf3YGiEzfegBXWSNxJowhmX8Vh2fShiBwUhgMyYOg'
    'kegiatan-6.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCaopbCy9M9n9YMYc5fiI84KSIDi3uGG65z3hBzFsmXmDGrIq0nw3WFojp7qnPiLI-FLU65ebmvkLc6WLZQku5G4J9cOzn-Fyk5FFRrE51MQMiFu8I_qRqUvZzDCU6_sDbzWtIuAvIMIe6eAcTHNu5hulSwkTszLSAXqBNrPUQ-qhI5cmPWUhnwyqnvczWQkiaR6Kr69-UM8LBtycaGQXZS0XGSe0jwdtikFhmiAQ'
    'kegiatan-7.jpg' = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBmwB6GBYPWJOVp-IZIrD59TAyIQ7Bp6Kcf4s30Tj5YyIEVWTHlYPEEWU8JX6cbU94JCBxp9bXllRiFIGa2AW6O469wyBto6-TDY2ZpnZAnG1tsmrdUk3nPHazMcsrqSAhzIi5eqjsCboGpwdr4lQlptWcVFSac8Jp3et5Yyvt8IcURipqsoaZdbDF79SX9yMOR6G_4lr1-YRLuEmvgmLSaMX6_QzYUGCGQhU3bGg'
}

foreach ($name in $images.Keys) {
    $outPath = Join-Path $dest $name
    try {
        Invoke-WebRequest -Uri $images[$name] -OutFile $outPath -TimeoutSec 15
        $size = (Get-Item $outPath).Length
        Write-Output "OK: $name ($size bytes)"
    } catch {
        Write-Output "FAIL: $name - $($_.Exception.Message)"
    }
}
