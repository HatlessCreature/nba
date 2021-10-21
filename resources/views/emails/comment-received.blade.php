<html>

<head>
</head>

<body>
    <div>
        <p>To the team {{ $team->name }}</p>
        <p>The user {{ $user->name }} has left a comment on your team page.</p>
        <blockquote>
            {{ $comment->content  }}
        </blockquote>
    </div>
</body>

</html>