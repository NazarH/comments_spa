<form action="" class="form" id='formBlock' method="post" enctype="multipart/form-data"> 
	@csrf
	<div class="form__top">
		<div>
			Написать комментарий
		</div>
		<div onclick='hideForm()'>
			×
		</div>
	</div>
	<div class="form__item">
		<div>
			<span class="red">*</span> Имя пользователя:
		</div>
		<input type="text" name='user_name' id='userName' placeholder="username" value="{{old('user_name')}}">
	</div>
	@error('user_name')
            <p class="red right">{{$message}}</p>
    @enderror
	<div class="form__item">
		<div>
			<span class="red">*</span> Email:
		</div>
		<input type="email" name='email' id='email' placeholder="example@gmail.com" value="{{old('email')}}">
	</div>
	@error('email')
            <p class="red right">{{$message}}</p>
    @enderror
	<div class="form__item">
		<div>
			Домашняя страница:
		</div>
		<input type="url" name='url' id='url' placeholder="https://example.com" value="{{old('url')}}">
	</div>
	@error('url')
        <p class="red right">{{$message}}</p>
    @enderror
    <div class="form__captcha">
    	<div>
    		<canvas class="form__captcha-area" id="canvas"></canvas>
    		<input type="button" onclick="getCaptcha()" value="Обновить">
    	</div>
    	<div>
    		<input type="text" id="typedText" placeholder="Повторите текст">
    		<input type="button" onclick="checkIt()" value="Check">
    	</div>
    </div>
	<div class="form__item text-area">
		<div class="form__area">
			<div class="form__file-area">
				<div>
					<div id='fileList'>
						<span>Список файлов...</span>
					</div>
				</div>
				<div class="form-file">
					<input type="file" name="files[]" id='filesArr' accept=".jpg,.gif,.png,.txt" width="320" height="240" multiple>
				</div>
			</div>
		</div>
		<div>
			<div class="form__btns">
				<div>
					<span class="form__text-btn" title="Ссылка: <a href='ссылка' title='описание'>текст</a>" onclick='textLink()'>A</span>

					<span class="form__text-btn" title="Код: <code>текст</code>" onclick='textCode()'>C</span>

					<span class="form__text-btn" title="Курсив: <i>текст</i>" onclick='textItal()'>I</span>

					<span class="form__text-btn" title="Жирный текст: <strong>текст</strong>" onclick='textStng()'>S</span>
				</div>
				<div>
					<span class="red">*</span> Текстовое поле:
				</div>
			</div>
			<textarea name="text" id="textArea" cols="30" rows="10" placeholder="Ваш текст...">{{old('text')}}</textarea>
			<div class="form__preview">
				<div class="form__prev">
					Предпросмотр:
				</div>
				<div class="form__prev-area">
					@php
					echo '<div class="pre-block"><pre id="prevArea"></pre></div>';
					@endphp
				</div>
			</div>
		</div>
	</div>
	@error('text')
        <p class="red right">{{$message}}</p>
    @enderror
	<div class="form__subm">
		<button type='submit' id="formSend" disabled>Отправить</button>
	</div>
</form>	

