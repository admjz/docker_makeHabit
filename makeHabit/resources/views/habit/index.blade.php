@extends('layouts/app')
@section('content')

<div class="habit-container">
  <div class="create-habit">
    <a href="{{ route('habit.create') }}"><i class="fas fa-plus-square fa-3x"></i></a>
  </div>
  <div class="habit-wrapper margin-top50">
    @if ($habits->isEmpty())
      <div class="container_title margin-top30 first-message">
        右上の＋ボタンを押して、習慣にしたいことを登録しましょう！
      </div>
    @else
      @foreach ($habits as $habit)
        <div class="habit-box">
          <div class="dropdown">
            <button class="dropdown_btn"><i class="fas fa-angle-down fa-2x"></i></button>
            <div class="dropdown_menu">
              <ul class="dropdown_menu_list">
                <li class="dropdown_menu_list_item">
                  <a href="{{ route('habit.edit', $habit->id) }}" class="dropdown_item-link">
                    <i class="fas fa-edit"></i>タイトルを編集する
                  </a>
                </li>
                <li class="dropdown_menu_list_item">
                  {!! Form::open(['route' => ['habit.destroy', $habit->id], 'method' => 'DELETE'])!!}
                    {!! Form::button('<i class="fas fa-trash-alt fa-sm">この習慣を削除する</i>',
                                      [
                                        'type' => 'submit',
                                        'class' => 'dropdown_item-link delete-link',
                                        'onclick' => "return confirm('このHabitを削除します。よろしいですか？')"
                                      ]
                                    )
                    !!}
                  {!! Form::close()!!}
                </li>
              </ul>
            </div>
          </div>
          <div class="habit-box_inner">
            <table class="habit-table">
              <tr>
                <td colspan="2" class="habit-table_title">{{ $habit->title }}</td>
              </tr>
              <tr>
                @php
                  $execution = $habit->executions->pluck('created_at')->last();
                @endphp
                <td colspan="2">
                    @if (isset($execution))
                      {{ $execution->diff(date("m/d H:i"))->format('%d日と%h時間  経過') }}
                    @else
                      &nbsp;
                    @endif
                </td>
              </tr>
              <tr></tr>
              <tr>
                <th>最新の実施日</th>
                <td>
                    @if (isset($execution))
                      <span>{{ $execution->format('Y/m/d') }}</span>
                    @else
                      <span>まだありません</span>
                    @endif
                </td>
              </tr>
            </table>
          </div>
          <div class="btn show-button">
            <a href="{{ route('habit.show', $habit->id) }}"><i class="far fa-calendar-check fa-2x"></i></a>
          </div>
        </div>
      @endforeach
      <script>
        $(function() {
          $('.dropdown_btn').on('click', function(){
              $(this).toggleClass('is-open')
          });
        });
      </script>
    @endif
  </div>
  <div class="pager margin-top50">
    {{ $habits->links() }}
  </div>
</div>

@endsection
