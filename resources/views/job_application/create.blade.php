<x-layout>
  <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" class="mb-4" />
  <x-job-card :$job />
  <x-card>
    <h2 class="mb-4 text-lg font-medium">
      Your Job Application
    </h2>
    <form action="{{route('job.application.store', $job)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">Expected Salary</label>
        <x-text-input type="number" name="expected_salary" />
      </div>
      <div class="mb-4">
        <label for="cv" class="mb-2 block text-sm font-medium text-slate-900">Upload CV</label>
        <x-text-input type="file" name="cv" />
      </div>
      <x-button class="w-full bg-blue-600 hover:bg-blue-500 text-white">Apply</x-button>
    </form>
  </x-card>
</x-layout>
