const FavoriteModal = ({
  children,
  title,
  mainClass = "",
  overlayClass = "",
  isModalOpen,
}) => {
  if (!isModalOpen) return null;

  return (
    <div
      className={`fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center z-[9999] ${overlayClass}`}
    >
      <div className="absolute inset-0 bg-black opacity-50"></div>

    
      <div
        className={`bg-white p-6 rounded-lg shadow-lg relative z-10 ${mainClass}`}
      >
        {title && <h2 className="text-2xl font-bold mb-4">{title}</h2>}
        {children}
      </div>
    </div>
  );
};

export default FavoriteModal;
