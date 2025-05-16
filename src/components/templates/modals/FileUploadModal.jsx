import { SlCloudUpload } from "react-icons/sl";
import Modal from "./Modal";
import Button from "../Button";
import { GrDocumentPdf } from "react-icons/gr";
import { FaRegTrashAlt } from "react-icons/fa";
import { useCallback, useRef, useState } from "react";
import { useDropzone } from "react-dropzone";
import DeleteModal from "./DeleteModal";
import { useDeleteMedia } from "../../../services/queries/protected/job.queries";
import { useSelector } from "react-redux";

const UploadedFileHeading = ({ title }) => {
  return <h2 className="text-xl font-semibold">{title}</h2>;
};

const FileList = ({ title, list, isOld = false, onDelete }) => {
  return (
    <div className="space-y-5">
      <UploadedFileHeading title={title} />
      <div className="space-y-5 max-h-56 overflow-y-auto pr-2">
        {Array.isArray(list) &&
          list.map((x, i) => {
            return (
              <div
                key={i}
                className="flex justify-between items-center f-bg gap-x-4 px-5 py-5 rounded-xl"
              >
                <div className="flex items-center gap-x-5">
                  <GrDocumentPdf className="text-4xl l-text" />
                  <div className="space-y-2">
                    <h2 className="text-xl font-semibold h-text">{x?.name}</h2>
                    <p className="text-lg l-text font-semibold">
                      {Math.round(x?.size / 1024)} KB
                    </p>
                  </div>
                </div>
                <FaRegTrashAlt
                  className="text-2xl cursor-pointer"
                  onClick={
                    () =>
                      onDelete({ id: isOld ? x?._id : x?.name, isOld: isOld })
                    // setFiles((prev) =>
                    //   prev.filter((f) => f?.name !== x?.name)
                    // )
                  }
                />
              </div>
            );
          })}
      </div>
      <hr />
    </div>
  );
};

const FileUploadModal = ({
  fileModalToggle,
  setFileModalToggle,
  files,
  setFiles
}) => {
  const hiddenFileInput = useRef();
  const handleClick = () => {
    hiddenFileInput.current.click();
  };

  const { mutate: deleteMediaMutate } = useDeleteMedia();

  const onDrop = useCallback(
    (acceptedFiles, rejectedFiles) => {

      const fileList = [];
      acceptedFiles.forEach((file) => {
        const find = files?.newFiles.find((x) => x?.name === file?.name);
        if (!find) fileList.push(file);
      });

      setFiles({
        ...files,
        newFiles: [...files.newFiles, ...(fileList || [])]
      });
    },
    [files]
  );
  const { getRootProps, getInputProps, isDragActive } = useDropzone({
    onDrop, accept: {
      'application/pdf': ['.pdf'],
      'image/*': ['.jpeg', '.png', ".jpg"]
    }
  });
  const [deleteToggle, setDeleteToggle] = useState(null);
  const { currentUser } = useSelector((state) => state.users);

  const onMediaDeleteHandler = (values) => {

    if (values?.isOld === false) {
      const newFilterFiles = files?.newFiles?.filter(
        (f) => f?.name !== values?.id
      );
      setFiles((prev) => ({ ...prev, newFiles: newFilterFiles }));
    } else {
      const body = {
        jobId: fileModalToggle,
        id: values?.id,
        updatedBy: currentUser?._id
      };

      deleteMediaMutate(body, {
        onSuccess: (data) => {
          if (data.isSuccess) {
            const oldFilterFiles = files?.oldFiles?.filter(
              (f) => f?._id !== values?.id
            );
            setFiles((prev) => ({ ...prev, oldFiles: oldFilterFiles }));
          }
        }
      });
    }
  };

  return (
    <>
      <DeleteModal
        deleteToggle={deleteToggle}
        setDeleteToggle={setDeleteToggle}
        onDeleteConfirm={onMediaDeleteHandler}
      />
      <Modal
        title={"File Upload"}
        isVisible={fileModalToggle}
        onClickFn={() => setFileModalToggle(null)}
      >
        <div className="space-y-14 px-5">
          <div
            {...getRootProps()}
            className="border-4 border-dashed rounded-3xl text-center space-y-8 p-10 h-[280px]"
          >
            <input
              {...getInputProps()}
              type="file"
              multiple
              className="hidden"
            />
            {isDragActive ? (
              <SlCloudUpload className="inline-block text-6xl" />
            ) : (
              <>
                <SlCloudUpload className="inline-block text-6xl" />
                <p className="text-2xl">Choose a file or drag & drop</p>
                <p className="text-2xl l-text">
                  JPEG, PNG and PDF formate, up to 10MB
                </p>
                <Button
                  onClick={handleClick}
                  className="bg-transparent border-2 h-text !rounded-full !py-4"
                >
                  Browse File
                </Button>
              </>
            )}
          </div>
          {console.log("fileList",files?.newFiles)}
          
          {files?.newFiles && files?.newFiles?.length > 0 &&
            <FileList
              title="New Files"
              list={files?.newFiles || []}
              onDelete={(x) => setDeleteToggle(x)}
            />
           } 
          {files?.oldFiles && files?.oldFiles?.length > 0 &&
            <FileList
              title="Old Files"
              list={files?.oldFiles || []}
              onDelete={(x) => setDeleteToggle(x)}
              isOld={true}
            />
          }
          {/* <div className="space-y-5">
            <UploadedFileHeading title="Old Files" />
            <div className="space-y-5 max-h-56 overflow-y-auto pr-2">
              {Array.isArray(files?.oldFiles) &&
                files?.oldFiles.map((x, i) => {
                  return (
                    <div
                      key={i}
                      className="flex justify-between items-center b-bg gap-x-4 px-5 py-5 rounded-xl"
                    >
                      <div className="flex items-center gap-x-5">
                        <GrDocumentPdf className="text-4xl l-text" />
                        <div className="space-y-2">
                          <h2 className="text-xl font-semibold h-text">
                            {x?.name}
                          </h2>
                          <p className="text-lg l-text font-semibold">
                            {Math.round(x?.size / 1024)} KB
                          </p>
                        </div>
                      </div>
                      <FaRegTrashAlt
                        className="text-2xl cursor-pointer"
                        // onClick={() =>
                        //   setFiles((prev) =>
                        //     prev.filter((f) => f?.name !== x?.name)
                        //   )
                        // }
                      />
                    </div>
                  );
                })}
            </div>
            <hr />
          </div>

          <div className="space-y-5">
            <UploadedFileHeading title="New Files" />
            <div className="space-y-5 max-h-56 overflow-y-auto pr-2">
              {console.log(files)}

              {Array.isArray(files?.newFiles) &&
                files?.newFiles?.map((x, i) => {
                  return (
                    <div
                      key={i}
                      className="flex justify-between items-center b-bg gap-x-4 px-5 py-5 rounded-xl"
                    >
                      {console.log("FIRLES", x?.relativePath)}
                      <div className="flex items-center gap-x-5">
                        <GrDocumentPdf className="text-4xl l-text" />
                        <div className="space-y-2">
                          <h2 className="text-xl font-semibold h-text">
                            {x?.name}
                          </h2>
                          <p className="text-lg l-text font-semibold">
                            {Math.round(x?.size / 1024)} KB
                          </p>
                        </div>
                      </div>
                      <FaRegTrashAlt
                        className="text-2xl cursor-pointer"
                        onClick={() =>
                          setFiles((prev) =>
                            prev.filter((f) => f?.name !== x?.name)
                          )
                        }
                      />
                    </div>
                  );
                })}
            </div>
          </div> */}

          <div className="flex justify-end">
            <Button
              onClick={() => {
                setFiles(files);
                setFileModalToggle(null);
              }}
              className="!py-4"
            >
              Confirm
            </Button>
          </div>
        </div>
      </Modal>
    </>
  );
};

export default FileUploadModal;
