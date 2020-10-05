                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                        @if($errors->has('slug'))
                            <span class="help-block">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::label('email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}

                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        {!! Form::label('password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}

                        @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        {!! Form::label('Password Confirmation') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                        @if($errors->has('password_confirmation'))
                            <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>                    
                    
                    
                
                    

                    <hr>

                    
                    <button class="btn btn-primary" type="submit" >{{$user->exists ? 'update' : 'save'}}</button>
                    <a href="{{route('categories.index')}}" class="btn btn-default">Cancel</a>