<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Content</td>
        </tr>
    </thead>

    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->name}}</td>
                <td>{{$post->content}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
