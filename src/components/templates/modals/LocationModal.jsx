const LocationModal = ({
  children,
  title,
  mainClass = "",
  overlayClass = "",
  isModalOpen,
}) => {
  if (!isModalOpen) return null;

  return (
    <div
      className={`fixed inset-0 flex items-center justify-center z-[9999] h-screen ${overlayClass}`}
    >
      <div className="absolute inset-0 bg-black opacity-50"></div>
      <div
        className={`bg-white p-6 rounded-lg shadow-lg relative z-10 ${mainClass}`}
      >
        <h2 className="text-2xl font-bold">{title}</h2>
        {children}
      </div>
    </div>
  );
};

export default LocationModal;
