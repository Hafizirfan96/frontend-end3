const Table = ({ children,classContainer }) => {
  return (
    <div className="flex flex-col">
      <div className="-m-1.5 overflow-x-auto">
        <div className="p-1.5 min-w-full inline-block align-middle">
          <div className={`border rounded-lg overflow-hidden dark:border-neutral-700 ${classContainer}`}>
            <table className="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              {children}
            </table>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Table;
