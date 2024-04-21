SELECT COUNT(DISTINCT likes.user_id) AS num_likes
FROM comments
JOIN likes ON comments.id = likes.comment_id
WHERE comments.id = :comment_id;

-- In this SQL statement:

-- comments is the table containing comments.
-- likes is the table containing likes, where each row represents a like by a user on a comment.
-- We use a JOIN between comments and likes based on the comment_id column to link comments with their likes.
-- We then count the distinct user_id values from the likes table to get the number of users who liked the comment.
-- The WHERE clause filters the comments to a specific comment, identified by :comment_id.