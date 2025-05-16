import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  toggleNav: false,
  toggleTaskDetailModal: false,
  toggleTaskDeleteModal: false,
  toggleTaskAddModal: false,
  toggleTaskEditModal: false
};

const templateSlice = createSlice({
  name: "template",
  initialState,
  reducers: {
    toggleNavFn(state, action) {
      state.toggleNav = action.payload;
    },
    toggleTaskDetailModalFn(state, action) {
      state.toggleTaskDetailModal = action.payload;
    },
    toggleTaskDeleteModalFn(state, action) {
      state.toggleTaskDeleteModal = action.payload;
    },
    toggleTaskAddModalFn(state, action) {
      state.toggleTaskAddModal = action.payload;
    },
    toggleTaskEditModalFn(state, action) {
      state.toggleTaskEditModal = action.payload;
    }
  }
});
export const {
  toggleNavFn,
  toggleTaskDetailModalFn,
  toggleTaskDeleteModalFn,
  toggleTaskAddModalFn,
  toggleTaskEditModalFn
} = templateSlice.actions;
export default templateSlice.reducer;
