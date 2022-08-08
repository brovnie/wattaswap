<template>
    <div class="text-center">
      <label class="relative inline-block mx-auto">
        <div class="img-wrapper">
          <img class="img--absolute" alt='profile avatar' v-if="url" :src="url">
        </div>
        <div class="edit-icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#FFFFFF">
  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
</svg>
        </div>
        <input 
          type="file" 
          id="profil_image" 
          name="profil_image" 
          accept="image/*"
          @change="onImageChange"
          class="">
      </label>
    </div>
</template>
<script>
export default {
  data() {
    return {
      url: "/storage/profile/avatar.jpg",
    }
  },
  methods: {
    onImageChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  }
};
</script>