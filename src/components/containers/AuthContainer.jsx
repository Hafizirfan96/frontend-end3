const AuthContainer = ({ children, className = "" }) => {
  return (
    <main
      className={`w-full min-h-screen flex justify-center items-center f-bg p-10 ${className}`}
    >
      {children}
    </main>
  );
};

export default AuthContainer;
