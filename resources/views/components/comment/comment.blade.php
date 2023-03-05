<div>
	<div class="comments__top">
		<div>
			{{$comment->user->user_name}} <span class="comments__span" onclick="showForm('{{route($action, ['main' => $main, 'answ' => $comment->id])}}')">(Ответить)</span>
		</div>
		<div>
			{{
				str_replace(' ', ' в ',substr(str_replace('-','.', $comment->created_at), 0, -3))
			}}
		</div>
	</div>
	<div class="comments__middle">
		<div>
			<pre>@php echo $comment->text;@endphp</pre>
		</div>
	</div>
	<div class="comments__bottom">
		@if(!$comment->files->isEmpty())
			<div class="comments__file-list">
				Список файлов:
			</div>
			<div class="comments__file img-block-{{$comment->id}}">
				@foreach($comment->files as $file)
					@if(!strpos($file->url, '.txt'))
					 <a href="{{asset('/storage/'.$file->url)}}">📷 {{str_replace('uploads/', '', $file->url)}}</a>
					@endif()
				@endforeach
			</div>
			<div class="comments__file">
				@foreach($comment->files as $file)
					@if(strpos($file->url, '.txt'))
					<div class='comments__file-item' onclick='read("{{'/storage/'.$file->url}}", "{{str_replace('uploads/', '', $file->url)}}")'>📄 {{str_replace('uploads/', '', $file->url)}}</div>
					@endif()
				@endforeach
			</div>
		@endif
	</div>
</div>
@if($comment->answers !== [])
	@foreach($comment->answers as $answer)
		<div class='comments__answer'>
			<x-comment.comment :action='$action' :comment='$answer' :main='$main'>
			</x-comment.comment>
		</div>
	@endforeach
@endif
