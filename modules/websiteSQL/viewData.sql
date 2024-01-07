SELECT
    ad.club,
    ad.avg_distance
FROM
    average_distances ad
    JOIN users u ON ad.userid = u.userid
WHERE
    u.userid = 1;