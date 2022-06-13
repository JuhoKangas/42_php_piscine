SELECT UPPER(last_name) AS 'NAME', first_name, price
FROM user_card
JOIN member ON user_card.id_user = member.id_user_card
JOIN subscription ON member.id_sub = subscription.id_sub
WHERE price > 42
ORDER BY last_name ASC, first_name ASC;
