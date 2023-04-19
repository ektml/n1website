import { createRoot } from 'react-dom/client'
import { useState } from 'react'
import { Modal } from 'react-bootstrap'
import 'react-toastify/dist/ReactToastify.css'
import { ToastContainer, toast } from 'react-toastify'

export const Authenticate = () => {
    const [currentModal, setCurrentModal] = useState()
    const onHide = () => setCurrentModal(undefined)

    return (
        <>
            <LoginModal currentModal={currentModal === "login"} onHide={onHide} change={() => setCurrentModal("register")} />
            <RegisterModal currentModal={currentModal === "register"} onHide={onHide} change={() => setCurrentModal("login")} />
            <a onClick={() => setCurrentModal('login')} className="btn px-4" href="#" role="button">تسجيل الدخول <i className="fa-solid fa-circle-user"></i></a>
            <ToastContainer position='top-right' />
        </>
    )
}

function LoginModal({ currentModal, onHide = () => { }, change }) {
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [disabled, setDisabled] = useState(false)

    const login = async () => {
        setDisabled(true)
        try {
            const { data } = await window.axios({
                method: "POST",
                url: "/api/login",
                data: {
                    email, password
                }
            })

            toast(`Logged in as ${data.data.user.name}`, {
                type: "success"
            })
        } catch (error) {
            const data = error.response.data
            toast(typeof data.data === "string" ? data.data : data.data[0], {
                type: "error"
            })
        }
        setDisabled(false)
    }

    return (
        <Modal show={currentModal} onHide={onHide}>
            <Modal.Header closeButton>
                <Modal.Title style={{ color: "#ff8000" }}>تسجيل الدخول</Modal.Title>
            </Modal.Header>
            <Modal.Body>
                <div className="col-lg-6 mt-5 mt-lg-0 text-end" style={{ marginLeft: "auto" }} data-aos-delay={100}>
                    <form
                        action="#"
                        method="post"
                        role="form"
                        className="php-email-form"
                        onSubmit={e => e.preventDefault()}
                    >
                        <div className="form-group mt-3">
                            <label className="mb-3">البريد الالكتروني</label>
                            <input
                                type="email"
                                className="form-control rounded-0"
                                name="email"
                                id="email"
                                value={email}
                                onChange={e => setEmail(e.target.value)}
                            />
                        </div>
                        <div className="form-group mt-3">
                            <label className="mb-3">كلمة المرور</label>
                            <input
                                type="text"
                                className="form-control rounded-0"
                                name="subject"
                                id="subject"
                                value={password}
                                onChange={e => setPassword(e.target.value)}
                            />
                        </div>
                        <div className="form-group mt-3">
                            <input type="checkbox" /> تذكرني
                        </div>
                    </form>
                </div>
            </Modal.Body>
            <Modal.Footer>
                <div className="form-group mt-3 text-center mx-auto">
                    <a className="btn px-5 mb-3" id="login" href="#" onClick={e => {
                        e.preventDefault()
                        if(disabled) return
                        login()
                    }}>تسجيل الدخول</a> <br />
                    <a style={{ cursor: "pointer" }}>لا تمتلك حسابا بعد؟ <span onClick={change} className="text-danger text-decoration-underline">انشاء حساب تاجر</span></a>
                </div>
            </Modal.Footer>
        </Modal>
    )
}

function RegisterModal({ currentModal, onHide = () => { }, change }) {
    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [phone, setPhone] = useState('')
    const [password, setPassword] = useState('')
    const [cp, setCp] = useState('')
    const [disabled, setDisabled] = useState(false)

    const register = async () => {
        if(password !== cp) return toast("Password don't match", { type: "error" })

        setDisabled(true)
        try {
            const { data } = await window.axios({
                method: "POST",
                url: "/api/register",
                data: {
                    email, password, password_confirmation: password, phone, name
                }
            })

            toast(`Registerd as ${data.data.user.name}`, {
                type: "success"
            })
        } catch (error) {
            const data = error.response?.data || "Something went wrong!"
            toast(typeof data.data === "string" ? data.data : data.data[0], {
                type: "error"
            })
        }
        setDisabled(false)
    }

    return (
        <Modal show={currentModal} onHide={onHide}>
            <Modal.Header closeButton>
                <Modal.Title style={{ color: "#ff8000" }}>انشاء حساب تاجر</Modal.Title>
            </Modal.Header>
            <Modal.Body className='mt-5 mt-lg-0 text-end'>
                <form
                    action="forms/contact.php"
                    method="post"
                    role="form"
                    className="php-email-form"
                    autoComplete="off"
                    onSubmit={e => e.preventDefault()}
                >
                    <div className="row">
                        <div className="col-lg-6">
                            <div className="form-group mt-3">
                                <label className="mb-3">اسم الشركة</label>
                                <input
                                    type="text"
                                    className="form-control rounded-0"
                                    name="CompanyName"
                                    id="CompanyName"
                                    value={name}
                                    onChange={e => setName(e.target.value)}
                                />
                            </div>
                            <div className="form-group mt-3">
                                <label className="mb-3">رقم السجل التجاري/ معروف</label>
                                <input
                                    type="text"
                                    className="form-control rounded-0"
                                    name="number"
                                    id="number"
                                    required=""
                                />
                            </div>
                            <div className="form-group mt-3">
                                <label className="mb-3">رقم الجوال</label>
                                <input
                                    type="text"
                                    className="form-control rounded-0"
                                    name="phone"
                                    id="phone"
                                    value={phone}
                                    onChange={e => setPhone(e.target.value)}
                                />
                            </div>
                            <div className="form-group mt-3">
                                <label className="mb-3">كلمة المرور</label>
                                <input
                                    type="password"
                                    className="form-control rounded-0"
                                    name="password"
                                    id="password"
                                    value={password}
                                    onChange={e => setPassword(e.target.value)}
                                />
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="form-group mt-3">
                                <label className="mb-3">نوع النشاط</label>
                                <select className="form-control rounded-0" name="ActiveType">
                                    <option value="">اختر نوع النشاط</option>
                                    <option value=""> </option>
                                </select>
                            </div>
                            <div className="form-group mt-3">
                                <label className="mb-3">صورة السجل التجاري/ معروف</label>
                                <br />
                                <label
                                    htmlFor="file"
                                    className="upload form-control d-flex flex-row-reverse"
                                >
                                    <i className="fa fa-duotone fa-cloud-arrow-up text-secondary" /> ارفع
                                    السجل التجاري\ معروف
                                </label>
                                <input
                                    type="file"
                                    className="form-control rounded-0"
                                    name="image"
                                    id="file"
                                    required=""
                                />
                            </div>
                            <div className="form-group mt-3">
                                <label className="mb-3">البريد الالكتروني</label>
                                <input
                                    type="email"
                                    className="form-control rounded-0"
                                    name="email"
                                    id="email"
                                    value={email}
                                    onChange={e => setEmail(e.target.value)}
                                />
                            </div>
                            <div className="form-group mt-3">
                                <label className="mb-3">تأكيد كلمة المرور</label>
                                <input
                                    type="password"
                                    className="form-control rounded-0"
                                    name="confirmPassword"
                                    id="confirmPassword"
                                    value={cp}
                                    onChange={e => setCp(e.target.value)}
                                />
                            </div>
                        </div>
                    </div>
                </form>
            </Modal.Body>
            <Modal.Footer>
                <div className="form-group mt-4 text-center mx-auto">
                    <a
                        className="btn px-5 mb-3"
                        id="login"
                        onClick={e => {
                            e.preventDefault()
                            if(disabled) return
                            register()
                        }}
                    >
                        انشاء الحساب
                    </a>{" "}
                    <br />
                    <a
                        style={{ cursor: "pointer" }}
                    >
                        {" "}
                        تمتلك حسابا؟{" "}
                        <span onClick={change} className="text-danger text-decoration-underline">تسجيل الدخول</span>
                    </a>
                </div>
            </Modal.Footer>
        </Modal>
    )
}

if (document.querySelector('n1-auth')) {
    createRoot(document.querySelector("n1-auth"))
        .render(<Authenticate />)
}
