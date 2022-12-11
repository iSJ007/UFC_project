/* 1. Get all the fighter by name from the fighter table*/
SELECT fighter_name 
from fighter;


/* 2. selecting fighter orthodox*/
SELECT * FROM ufc_database.fighter
	WHERE fighter_stance = "Orthodox";



/* 3. fighters with > 0 takedown average has a > 0 defense*/
SELECT fighter_id, fighter_name, fighter_tdavg, fighter_tddef
	FROM fighter
  
   WHERE (
   fighter_tdavg > 0.01
   and fighter_tddef > 0.01
   )
order by fighter_name;


/* 4. gets the name and slpm of a fighter who has won a championship match, also is part of the p4p and has the highest strikes lander per min  */

select  Distinct fighter_name, fighter_slpm 
from fighter
join fights 
on fighter.fighter_name = fights.R_fighter
join rankings 
on fights.R_fighter = rankings.Name 
and fighter.fighter_name = fights.fight_winner having fighter.fighter_slpm = max(fighter.fighter_slpm)
order by fighter_slpm desc
limit 1;

/*5. Display only southpaw stance fighters  */


SELECT * FROM ufc.fighter
   WHERE fighter_stance = "Southpaw";



/*6. We can connect the fighter stats database (fighter_id) to fight_id (fights database) and filter it to those 2 specific fighters that were in those fight events, then we connect and display the name and rank table of those fighters.  */

SELECT
   ALL fighter.*,
   fights.*,
   fighter.fighter_id,
   rankings.*
FROM
   fighter fighter
   INNER JOIN fights fights
   ON fighter.fighter_id = fights.fight_id
   INNER JOIN rankings rankings
   ON fighter.fighter_name = rankings.Name;



/* 7. From the top 500, see all the fighters age that was less than 40 from both red & blue fighters from the fighter dataset, and see what were the strike accuracy numbers for the top rank fighters from the dataset while also visualizing their nickname. Most fighters under the age 40 had better skills, more agility and faster comprehending/thinking */

SELECT
   ALL rankings.Rank,
   fighter.fighter_stracc,
   fighter.fighter_name,
   fighter.fighter_nick,
   fights.R_fighter,
   fights.R_age,
   fights.B_fighter,
   fights.B_age
FROM
   fights fights
INNER JOIN    
   rankings rankings
   ON fights.fight_winner = rankings.Name
   INNER JOIN fighter fighter
   ON fighter.fighter_name = rankings.Name
WHERE
   (fights.R_age < 40) AND (fights.B_age < 40)
GROUP BY
   rankings.Rank, fights.R_age, fights.B_age;



/* 8. get the avg age of the of champion fight fighters */

select avg(i.R_age)
from (select fight_id, fights.R_age from fights) as i, fights 
where i.fight_id = fights.fight_id;



/* 9. gets the most common years a top 100 fighter is born that has also held a title fight  */

SELECT year, count(year) as cnt
from(select DISTINCT SUBSTR(fighter_dob, LENGTH(fighter_dob) - 8, 4) as year, fighter_name
from fighter
inner join rankings on fighter.fighter_name = rankings.Name
inner join fights on rankings.Name = fights.R_fighter
where rankings.Rank <= 100 )
group by year
order by cnt desc;

/* 10.  the fighters that weigh between 150 and 200 are most winners */

SELECT
   ALL fighter.fighter_name,
   fighter.fighter_weight
FROM
   fighter fighter
WHERE
   (fighter.fighter_weight BETWEEN '150' AND '200');





/* 11. Get the average height of title fight winners that are also part of the p4p and see if the are above average , below average or just average*/

select * ,
case when avh > 6.0 then "The height is above average" 
when avh < 5.9 then "The height is below average"
else "The height is average"
end as txt
from( select avg(fighter_height) as avh
from fighter, rankings, fights 
where fighter.fighter_name = rankings.Name and rankings.Name = fights.fight_winner 
and fighter.fighter_weight >= 175 and fighter.fighter_weight <= 200);



/* 12. displaying fighters with a > 1 strikes landed per minute*/

SELECT fighter_name, fighter_slpm
	FROM fighter
   WHERE fighter_slpm > 1;


/* 13. See the fight winner in title fights and see what stance changes they used and what division to see which stance led them to more wins according to the title fights (different stances equals different techniques and different types of accuracy/striking.  */
SELECT
	ALL fighter.fighter_stance,
	fights.fight_winner,
	fighter.fighter_class
FROM
	fighter fighter
	CROSS JOIN fights fights
ORDER BY
        fights.fight_winner ASC;


/* 14. Filter the fighter data to the only winner of the top 500 ranks and display only those that wons from: ranks, fight_location, Name, and fight_location */

SELECT ALL
   fights.fight_winner,
   fights.fight_location,
   rankings.Name,
   rankings.Rank
FROM
   fights fights
INNER JOIN    
   rankings rankings
ON
   fights.fight_winner = rankings.Name
CROSS JOIN
   fighter fighter
GROUP BY
   rankings.Rank;


/* 15. Gets the fighter that won in the compare fucntion and sees if how many tile fights they won and what finish they got  */
select Distinct fighter_name , titlewincnt, finish
from (
select distinct fighter_id, fighter_name, titlewincnt, finish
from(
Select  fighter_id, fighter_name, finish, count(*) as titlewincnt
from fighter, fights, compare
where fighter_id  = compare.winner and fighter_name = fights.fight_winner
group by fighter_id) as data, compare
where data.fighter_id = compare.winner
order by titlewincnt desc) as data1, compare
where compare.winner = data1.fighter_id;


/* 16.insert fake data into ratings      */

insert into ratings 
values(1,1,7.4);


/* 17. gets the countries and location of compare function winners*/
select DISTINCT fighter_loc, fighter_country 
from fighter , compare 
where fighter.fighter_id = compare.winner and fighter_loc is not NULL;


/* 18. Gets all the fighter and the total value of their stats: */

select fighter_id, fighter_name, max(a.val)
FROM (
   SELECT sd.fighter_slpm as val , sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_stracc as val, sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_strdef as val, sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_tdavg as val , sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_tdacc as val , sd.fighter_id  FROM fighter sd   UNION ALL 
   SELECT sd.fighter_subavg as val, sd.fighter_id  FROM fighter sd ) AS a, fighter
   where a.fighter_id = fighter.fighter_id
   group by a.fighter_id;


/*19. Display only FighterS Winners TKO from Title Fights, gives those specific fighters leverage to win*/

SELECT ALL
   fights.Fights,
   fights.finish,
   fights.fight_winner
FROM
   fights fights
WHERE
   (fights.finish = 'KO/TKO');


/*20. insert into compare */

insert into compare
values(2,1,22,24 , 22);











