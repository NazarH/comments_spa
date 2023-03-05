<div class='comments__text-file' id="fileTxt">
	<a href="" id='fileDownload' class="comments__download" download="text_file">💾</a>
	<div onclick="fileClose()" class="comments__text-close lg-close lg-icon">
		×
	</div>
	<div>
		<div id="fileName"></div>
		<pre id="whatchFile"></pre>
	</div>
</div>
<x-base.index>
	<x-slot:title>
        Comments SPA
    </x-slot>
	<div class="container">
		@php
			$action = 'home.send-form';
		@endphp
		<x-form.form :action='$action'></x-form.form>
		<div class="comments" id="commentBlock">
			<div class="comments__first">
				<div class="comments__create">
					<button onclick="showForm('{{route($action)}}')">
						Создать комментарий
					</button>
				</div>
				<div class="comments__paginate">
					{{$comments->links()}}
				</div>
			</div>
			<div class="comments__last">
				<table>
					<tr>
			            <th>
			            	@sortablelink('user_id', 'Имя юзера')
			            </th>
			            <th>
			            	@sortablelink('email', 'Почта')
			            </th>
			            <th>
			            	@sortablelink('created_at', 'Дата')
			            </th>
			        </tr>
			        @unless(empty($comments))
			        	@foreach($comments as $comment)
			        		@php
			        			$main = $comment->id;
			        		@endphp
			        		<tr onclick='showMessages({{$comment->id}})'>
			        			<td>{{$comment->user->user_name}}</td>
			        			<td>{{$comment->email}}</td>
			        			<td>
			        				{{
			        					str_replace(' ', ' в ',substr(str_replace('-','.', $comment->created_at), 0, -3))
			        				}}
			        			</td>
			        		</tr>
			        		<tr id="commentArea{{$comment->id}}" class="comments__area-block">
			        			<td colspan="3" class="comments__area">
			        				<x-comment.comment :action='$action' :comment='$comment' :main='$main'>
			        				</x-comment.comment>
			        			</td>
			        		</tr>	
			        	@endforeach
			        @endunless
				</table>
			</div>
			<div class="comments__paginate bottom">
				{{$comments->links()}}
			</div>
		</div>
	</div>
</x-base.index>

