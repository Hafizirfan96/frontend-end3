import React from "react";

const SubmitButton = ({ title, className, onClick }) => {

  const onNavigate = () => {
    onClick()
  }

  return (
    <div className={`flex ${className}`}>
      <button
        onClick={onNavigate}
        className="px-10 py-4 text-white bg-cs-primary-text font-poppins  rounded-full">
        {title}
      </button>
    </div>
  );
};

export default SubmitButton;
