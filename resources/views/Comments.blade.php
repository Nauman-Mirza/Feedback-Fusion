<!DOCTYPE html>
<html>
<head>
    <title>Comments Form</title>
    <link rel="stylesheet" href="{{ asset('css/comments.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
            <div class="buttons">
                <form action="{{ route('userLogout') }}" method="POST">
                    @csrf
                    <button type="submit" >Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class="main">Comments View</h1>
    <table class="comments-table">
        <thead>
            <tr class="comment-tr">
                <th class="user-header">Comment By</th>
                <th class="comment-header">Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td class="user-cell">{{ $comment->user->name }}</td>
                    <td class="comment-cell">{{ $comment->comment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="main1">Add Comments</h1>
    <form action="{{ route('addComments') }}" method="POST">
        @csrf
        
        <textarea id="comments" name="comments" rows="4" cols="50" class="comments-textarea"></textarea><br><br>
        
        <!-- Emoji Picker Button -->
        <button type="button" id="emoji-picker-button" class="emoji-picker-button">😊 Emoji</button>

        <!-- Hidden Emoji Picker -->
        <div id="emoji-picker" class="emoji-picker">
    <span class="emoji" onclick="insertEmoji('😊')">😊</span>
    <span class="emoji" onclick="insertEmoji('🌟')">🌟</span>
    <span class="emoji" onclick="insertEmoji('🎉')">🎉</span>
    <span class="emoji" onclick="insertEmoji('❤️')">❤️</span>
    <span class="emoji" onclick="insertEmoji('😂')">😂</span>
    <span class="emoji" onclick="insertEmoji('👍')">👍</span>
    <span class="emoji" onclick="insertEmoji('👏')">👏</span>
    <span class="emoji" onclick="insertEmoji('🥂')">🥂</span>
    <span class="emoji" onclick="insertEmoji('🎁')">🎁</span>
    <span class="emoji" onclick="insertEmoji('🤗')">🤗</span>
    <span class="emoji" onclick="insertEmoji('🙌')">🙌</span>
    <span class="emoji" onclick="insertEmoji('🌺')">🌺</span>
    <span class="emoji" onclick="insertEmoji('🍀')">🍀</span>
    <span class="emoji" onclick="insertEmoji('💖')">💖</span>
    <span class="emoji" onclick="insertEmoji('🚀')">🚀</span>
    <span class="emoji" onclick="insertEmoji('🌈')">🌈</span>
    <span class="emoji" onclick="insertEmoji('🐱')">🐱</span>
    <span class="emoji" onclick="insertEmoji('🌞')">🌞</span>
    <span class="emoji" onclick="insertEmoji('🍎')">🍎</span>
    <span class="emoji" onclick="insertEmoji('🍓')">🍓</span>
</div>


        <button type="submit" class="add-comment-button">Done</button>
    </form>
    
    <!-- JavaScript to handle emoji insertion -->
    <script>
        function insertEmoji(emoji) {
            var textarea = document.getElementById('comments');
            var currentText = textarea.value;
            var caretPosition = textarea.selectionStart;
            var newText = currentText.substring(0, caretPosition) + emoji + currentText.substring(caretPosition);
            textarea.value = newText;
        }

        document.getElementById('emoji-picker-button').addEventListener('click', function () {
            var emojiPicker = document.getElementById('emoji-picker');
            emojiPicker.style.display = (emojiPicker.style.display === 'block') ? 'none' : 'block';
        });
    </script>
</body>
</html>
