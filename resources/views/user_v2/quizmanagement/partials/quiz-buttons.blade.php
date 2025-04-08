
@foreach ($allquizzes as $quest)
    <a href="{{ route('user.quiz.test.show', ['quiz_management_slug'=>$quizbankmanagement->slug,'quiz_slug'=>$quest->slug,'query'=>$query]) }}"
        class="btn {{ $quest->id == $quiz->id ? 'btn-primary' : ' btn-soft-primary' }}">{{ Helpers::quizName($quest->slug) }}</a>
@endforeach
