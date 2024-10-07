<x-layout>
  <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']" class="mb-4"/>
  <x-job-card :$job>
    <p class="text-sm text-slate-500 mb-4">
      {!! nl2br(e($job->description)) !!}
    </p>
  </x-job-card>
</x-layout>
