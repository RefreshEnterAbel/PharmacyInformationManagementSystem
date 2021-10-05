<template>
  <div class="flex h-screen bg-gray-200 font-roboto">
    <sidebar />
    <div class="flex-1 flex flex-col overflow-hidden">
      <Header />
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 m-6">
        <child />
      </main>
    </div>
  </div>
</template>

<script>

export default {
  name: 'MainLayout'
}
</script>
