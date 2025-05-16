import React from "react";

const CustomModal = ({ isOpen, onClose, children, mainClass = "", overlayClass = "" }) => {
    if (!isOpen) return null;

    return (
        <div className={`fixed inset-0 bg-black bg-opacity-50 z-[9998] ${overlayClass}`} onClick={onClose}>
            <div className={`fixed inset-0 flex items-center justify-center p-4 z-[9999] ${mainClass}`} onClick={(e) => e.stopPropagation()}>
                <div className="bg-white rounded-3xl p-6 w-full max-w-md md:max-w-lg lg:max-w-xl shadow-lg relative">
                    {children}
                    <button onClick={onClose} className="absolute top-2 right-2 text-gray-600 text-xl">&times;</button>
                </div>
            </div>
        </div>
    );
};

export default CustomModal;
