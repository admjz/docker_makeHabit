@extends('layouts/app')
@section('content')

<div class="habit-container">
  <div class="create-habit">
    <a href="{{ route('habit.create') }}"><i class="fas fa-plus-square fa-3x"></i></a>
  </div>
  <div class="habit-wrapper margin-top50">
    @if ($habits->isEmpty())
      <div class="container_title margin-top30 first-message">右上の＋ボタンを押して、習慣にしたいことを登録しましょう！</div>
    @else
      @foreach ($habits as $habit)
        <div class="habit-box">
          <div class="habit-box_inner">
            <a href="{{ route('habit.show', $habit->id) }}">
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
                        {{ $execution->format('Y/m/d') }}
                      @else
                        まだありません
                      @endif
                  </td>
                </tr>
              </table>
            </a>
          </div>
          <div class="btn edit-form">
            <a href="{{ route('habit.edit', $habit->id) }}"><i class="fas fa-edit fa-2x"></i></a>
          </div>
          <div class="delete-form">
            {!! Form::open(['route' => ['habit.destroy', $habit->id], 'method' => 'DELETE'])!!}
              {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn delete-btn', 'onclick' => "return confirm('このHabitを削除します。よろしいですか？')"]) !!}
            {!! Form::close()!!}
          </div>
        </div>
      @endforeach
    @endif
  </div>
  <div class="pager margin-top50">
    {{ $habits->appends(request()->all())->links() }}
  </div>
</div>

@endsection
