-- Update company profile address to new address
UPDATE `company_profiles` 
SET `address` = 'Jl. TM. Slamet Riyadi Raya No. 9 RT.1 RW. 4 Kb. Manggis, Kec. Matraman, Daerah Khusus Ibukota Jakarta 13150'
WHERE `address` LIKE '%Jl. Melawai 5%' OR `address` LIKE '%Jakarta Selatan%12160%';
