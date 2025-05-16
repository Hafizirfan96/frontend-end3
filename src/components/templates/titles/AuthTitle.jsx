
const AuthTitle = ({ heading, slogan, className }) => {
  return (
    <div className="space-y-5">
      <h1 className={`text-5xl text-center font-bold ${className}`}>
        {heading}
      </h1>
      <h2 className="text-2xl font-semibold text-center h-text">{slogan}</h2>
    </div>
  );
};

export default AuthTitle;
