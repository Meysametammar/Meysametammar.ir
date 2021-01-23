import { useState } from "react";
import PropTypes from "prop-types";
import { Upload, message } from "antd";
import { LoadingOutlined, PlusOutlined } from "@ant-design/icons";
import Auth from "~/controller/Auth";

const UploadOneImage = ({ setFileId, actionName }) => {
    const getBase64 = (img, callback) => {
        const reader = new FileReader();
        reader.addEventListener("load", () => callback(reader.result));
        reader.readAsDataURL(img);
    };

    const beforeUpload = file => {
        const isJpgOrPng = file.type === "image/jpeg" || file.type === "image/png" || "image/jpg";
        if (!isJpgOrPng) {
            message.error("You can only upload JPG/PNG file!");
        }
        const isLt2M = file.size / 1024 / 1024 < 2;
        if (!isLt2M) {
            message.error("Image must smaller than 2MB!");
        }
        return isJpgOrPng && isLt2M;
    };

    const [loading, setLoading] = useState(false);
    const [file, setFile] = useState();

    const uploadButton = (
        <div>
            {loading ? <LoadingOutlined /> : <PlusOutlined />}
            <div style={{ marginTop: 8 }}>Upload</div>
        </div>
    );

    const handleChange = info => {
        if (info.file.status === "uploading") {
            setLoading(true);
            return;
        }
        if (info.file.status === "done") {
            getBase64(info.file.originFileObj, imageUrl => {
                setLoading(false);
                setFile({ url: imageUrl });
            });
        }
    };

    const uploadRequest = {
        headers: {
            Authorization: `Bearer ${Auth.token()}`
        },
        endpoint: `${process.env.API_ENDPOINT}api/file`
    };
    return (
        <Upload
            listType="picture-card"
            className="avatar-uploader"
            showUploadList={false}
            beforeUpload={beforeUpload}
            onChange={handleChange}
            headers={uploadRequest.headers}
            action={uploadRequest.endpoint}
            data={{ type: actionName }}
        >
            {file ? <img src={file.url} alt="yourImage" style={{ width: "100%" }} /> : uploadButton}
        </Upload>
    );
};

UploadOneImage.propTypes = {
    setFileId: PropTypes.any.isRequired,
    actionName: PropTypes.string.isRequired
};

export default UploadOneImage;
