<template>
    <div class="container">
      <h2>Drag and Drop Example</h2>
      <div class="row">
        <div class="col-md-6">
          <h3>Available Items</h3>
          <ul>
            <li v-for="(item, index) in availableItems" :key="index" v-draggable="{value: item, group: 'items', handle: '.handle'}">
              <span class="handle">&#8597;</span>
              {{ item }}
            </li>
          </ul>
        </div>
        <div class="col-md-6">
          <h3>Selected Items</h3>
          <ul v-dropzone="{group: 'items'}" @drop="onDrop">
            <li v-for="(item, index) in selectedItems" :key="index">
              {{ item }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        availableItems: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5'],
        selectedItems: [],
      };
    },
    methods: {
      onDrop(event) {
        this.selectedItems.push(event.draggedContext.element.value);
      },
    },
  };
  </script>
  