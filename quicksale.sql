CREATE TABLE categoria (
    id integer NOT NULL,
    nombre_categoria character varying(50) NOT NULL
);


ALTER TABLE categoria OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16419)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categoria_id_seq OWNER TO postgres;

--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 186
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categoria_id_seq OWNED BY categoria.id;


--
-- TOC entry 182 (class 1259 OID 16396)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(191) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 16394)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE migrations_id_seq OWNER TO postgres;

--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 181
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- TOC entry 188 (class 1259 OID 16427)
-- Name: negocio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE negocio (
    nombre_negocio character varying(70) NOT NULL,
    id_user integer
);


ALTER TABLE negocio OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16415)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE password_resets (
    email character varying(191) NOT NULL,
    token character varying(191) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE password_resets OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16452)
-- Name: producto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE producto (
    nombre_producto character varying(30) NOT NULL,
    sub_categoria character varying(30) NOT NULL,
    descripcion character varying(200) NOT NULL,
    precio real NOT NULL,
    cantidad integer NOT NULL,
    id_producto integer NOT NULL
);


ALTER TABLE producto OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 16477)
-- Name: producto_id_producto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE producto_id_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE producto_id_producto_seq OWNER TO postgres;

--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 193
-- Name: producto_id_producto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE producto_id_producto_seq OWNED BY producto.id_producto;


--
-- TOC entry 189 (class 1259 OID 16437)
-- Name: sub_categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE sub_categoria (
    nombre_sub character varying(30) NOT NULL,
    categoria integer NOT NULL,
    negocio character varying(70) NOT NULL
);


ALTER TABLE sub_categoria OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16404)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(191) NOT NULL,
    email character varying(191) NOT NULL,
    password character varying(191) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 16402)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- TOC entry 2183 (class 0 OID 0)
-- Dependencies: 183
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 192 (class 1259 OID 16464)
-- Name: ventas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ventas (
    id integer NOT NULL,
    nombre_negocio character varying(70) NOT NULL,
    producto character varying(50) NOT NULL,
    cantidad character varying(50) NOT NULL,
    precio real NOT NULL,
    comprador character varying(50) NOT NULL
);


ALTER TABLE ventas OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 16462)
-- Name: ventas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ventas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ventas_id_seq OWNER TO postgres;

--
-- TOC entry 2184 (class 0 OID 0)
-- Dependencies: 191
-- Name: ventas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ventas_id_seq OWNED BY ventas.id;


--
-- TOC entry 2020 (class 2604 OID 16424)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categoria ALTER COLUMN id SET DEFAULT nextval('categoria_id_seq'::regclass);


--
-- TOC entry 2018 (class 2604 OID 16399)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- TOC entry 2021 (class 2604 OID 16479)
-- Name: id_producto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY producto ALTER COLUMN id_producto SET DEFAULT nextval('producto_id_producto_seq'::regclass);


--
-- TOC entry 2019 (class 2604 OID 16407)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2022 (class 2604 OID 16467)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ventas ALTER COLUMN id SET DEFAULT nextval('ventas_id_seq'::regclass);


--
-- TOC entry 2165 (class 0 OID 16421)
-- Dependencies: 187
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categoria (id, nombre_categoria) FROM stdin;
\.


--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 186
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categoria_id_seq', 1, false);


--
-- TOC entry 2160 (class 0 OID 16396)
-- Dependencies: 182
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
\.


--
-- TOC entry 2186 (class 0 OID 0)
-- Dependencies: 181
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('migrations_id_seq', 2, true);


--
-- TOC entry 2166 (class 0 OID 16427)
-- Dependencies: 188
-- Data for Name: negocio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY negocio (nombre_negocio, id_user) FROM stdin;
\.


--
-- TOC entry 2163 (class 0 OID 16415)
-- Dependencies: 185
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2168 (class 0 OID 16452)
-- Dependencies: 190
-- Data for Name: producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY producto (nombre_producto, sub_categoria, descripcion, precio, cantidad, id_producto) FROM stdin;
\.


--
-- TOC entry 2187 (class 0 OID 0)
-- Dependencies: 193
-- Name: producto_id_producto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('producto_id_producto_seq', 1, false);


--
-- TOC entry 2167 (class 0 OID 16437)
-- Dependencies: 189
-- Data for Name: sub_categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sub_categoria (nombre_sub, categoria, negocio) FROM stdin;
\.


--
-- TOC entry 2162 (class 0 OID 16404)
-- Dependencies: 184
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name, email, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2188 (class 0 OID 0)
-- Dependencies: 183
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- TOC entry 2170 (class 0 OID 16464)
-- Dependencies: 192
-- Data for Name: ventas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ventas (id, nombre_negocio, producto, cantidad, precio, comprador) FROM stdin;
\.


--
-- TOC entry 2189 (class 0 OID 0)
-- Dependencies: 191
-- Name: ventas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ventas_id_seq', 1, false);


--
-- TOC entry 2031 (class 2606 OID 16426)
-- Name: categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 2024 (class 2606 OID 16401)
-- Name: migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2033 (class 2606 OID 16431)
-- Name: negocio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY negocio
    ADD CONSTRAINT negocio_pkey PRIMARY KEY (nombre_negocio);


--
-- TOC entry 2037 (class 2606 OID 16485)
-- Name: producto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id_producto);


--
-- TOC entry 2035 (class 2606 OID 16441)
-- Name: sub_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sub_categoria
    ADD CONSTRAINT sub_categoria_pkey PRIMARY KEY (nombre_sub);


--
-- TOC entry 2026 (class 2606 OID 16414)
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2028 (class 2606 OID 16412)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2039 (class 2606 OID 16469)
-- Name: ventas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (id, nombre_negocio);


--
-- TOC entry 2029 (class 1259 OID 16418)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- TOC entry 2040 (class 2606 OID 16432)
-- Name: negocio_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY negocio
    ADD CONSTRAINT negocio_id_user_fkey FOREIGN KEY (id_user) REFERENCES users(id);


--
-- TOC entry 2043 (class 2606 OID 16457)
-- Name: producto_sub_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY producto
    ADD CONSTRAINT producto_sub_categoria_fkey FOREIGN KEY (sub_categoria) REFERENCES sub_categoria(nombre_sub);


--
-- TOC entry 2041 (class 2606 OID 16442)
-- Name: sub_categoria_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sub_categoria
    ADD CONSTRAINT sub_categoria_categoria_fkey FOREIGN KEY (categoria) REFERENCES categoria(id);


--
-- TOC entry 2042 (class 2606 OID 16447)
-- Name: sub_categoria_negocio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sub_categoria
    ADD CONSTRAINT sub_categoria_negocio_fkey FOREIGN KEY (negocio) REFERENCES negocio(nombre_negocio);


--
-- TOC entry 2044 (class 2606 OID 16470)
-- Name: ventas_nombre_negocio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ventas
    ADD CONSTRAINT ventas_nombre_negocio_fkey FOREIGN KEY (nombre_negocio) REFERENCES negocio(nombre_negocio);


--
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-10-11 20:36:33

--
-- PostgreSQL database dump complete
--

